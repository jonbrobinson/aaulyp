<?php

namespace App\Http\Controllers;

use App\Aaulyp\Services\AdminHelper;
use App\Aaulyp\Services\Emailer;
use App\Aaulyp\Services\EventsBuilder;
use App\Aaulyp\Services\UploadCareHelper;
use App\Aaulyp\Tools\Toolbox;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    protected $emailer;
    protected $adminHelper;
    protected $eventsBuilder;

    /**
     * AdminController constructor.
     *
     * @param AdminHelper $adminHelper
     * @param Emailer     $emailer
     */
    public function __construct(AdminHelper $adminHelper, Emailer $emailer, EventsBuilder $eventsBuilder)
    {
        $this->middleware('auth', ['except' => ['fetchToken', 'generateToken', 'editAdmin', 'updateAdminPosition', 'updateAdminImg', 'resetAdminImg']]);
        parent::__construct();

        $this->adminHelper = $adminHelper;
        $this->emailer = $emailer;
        $this->eventsBuilder = $eventsBuilder;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function generateToken(Request $request)
    {
        $adminHelper = $this->adminHelper;

        $validator = Validator::make($request->all(), [
            'token' => 'required',
        ]);

        $token = $request->get('token');

        $validator->after(function($validator) use ($adminHelper, $token) {
            if (!$adminHelper->isTokenValid($token)) {
                $validator->errors()->add('token', 'Authentication Token Has Expired');
            }
        });

        if ($validator->fails() && $token) {
            $tokenErrorMessage = $validator->errors()->first('token');

            if ($request->route()->uri() == 'admin'){
                return view("pages.admin.tokenRequest", ['errorMessage' => $tokenErrorMessage]);
            }

            return redirect('/admin')
                ->withErrors($validator);
        }

        if($validator->fails() && env('APP_ENV') != 'local') {
            return view('pages.admin.tokenRequest');
        }

        $events = $this->eventsBuilder->getCurrentEventTicketInfo();

        $jsonEvents = json_decode(json_encode($events));

        $positions = $this->adminHelper->getActivePositions();

        $officers = $this->adminHelper->getActiveOfficers();

        return view('pages.admin.dashboard', [
            "events" => $jsonEvents,
            "positions" => $positions,
            "officers" => $officers
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function fetchToken(Request $request)
    {
        $adminHelper = $this->adminHelper;

        $email = $request->input('email');
        $validator = Validator::make(['email' => $email], [
            'email' => 'required',
        ]);

        $validator->after(function($validator) use ($adminHelper, $email) {
            if (!$adminHelper->isAdminEmail($email)) {
                $validator->errors()->add('email', 'Access Denied: Unathorized');
            }
        });

        if ($validator->fails()) {
            $emailErrorMessage = $validator->errors()->first('email');

            if ($request->route()->uri() == 'admin'){
                return view("pages.admin.tokenRequest", ['errorMessage' => $emailErrorMessage]);
            }

            return redirect('/admin')
                ->withErrors($validator);
        }

        $tokenMeta = $adminHelper->runAdminTokenProcess();

        if (env('APP_ENV') == 'local') {
            $email = 'pr.aaulyp+testTokenEmail@gmail.com';
        }

        if ($tokenMeta) {
            $this->emailer->sendAdminTokenEmail($email, $tokenMeta);
        }

        return redirect('/admin?token='.$tokenMeta->token)->with("successMessage", "Success!. Please Check Your email for your token");
    }

    public function editAdmin(Request $request)
    {
        $adminHelper = $this->adminHelper;

        $token = $request->input('token');
        $validator = Validator::make(['token' => $token], [
            'token' => 'required',
        ]);

        $validator->after(function($validator) use ($adminHelper, $token) {
            if (!$adminHelper->isTokenValid($token)) {
                $validator->errors()->add('token', 'Authentication Token Has Expired');
            }
        });

        if ($validator->fails() && env('APP_ENV') != 'local') {
            return redirect('/admin')
                ->withErrors($validator);
        }

        $officers = $adminHelper->getSortedPositionsByType('officer');
        $chairs = $adminHelper->getSortedPositionsByType('chair');

        return view('pages.update_positions', ["chairs" => $chairs, "officers" => $officers]);
    }

    /**
     * @param Request $request
     * @param string  $index
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAdminPosition(Request $request, $index)
    {
        $adminHelper = $this->adminHelper;

        $token = $request->get('token-hidden');
        $updatedUser = $request->all();
        $validator = Validator::make($updatedUser, [
            'first_name' => 'required',
            'last_name' => 'required',
            'title' => 'required',
            'email' => 'required',
            'about' => 'present',
            'description' => 'present',
            'social-twitter' =>'present',
            'social-facebook' => 'present',
            'social-linkedin' => 'present',
            'token->hidden' => 'present'
        ]);


        $validator->after(function($validator) use ($adminHelper, $index, $token) {
            if (!$adminHelper->isTokenValid($token)) {
                $validator->errors()->add('token', 'Authentication Token Has Expired');
            }

            if (empty($adminHelper->getPositionByIndex($index))) {
                $validator->errors()->add('index', 'Invalid Request');
            }
        });

        $errors = $validator->errors();
        if ($errors && $errors->get('token')) {
            return response()
                ->json([
                    'message' => 'Input submission Errors',
                    'errors' => $errors->get('token')
                ],400);
        }

        $completed = $adminHelper->updatePositionViaFormUser($updatedUser, $index);
        $position = $adminHelper->getPositionByIndex($index);
        if ($completed) {
            return response()
                ->json([
                    'success' => "Success! {$position['title']} Updated",
                ], 200);
        }

        return response()
            ->json([
                'message' => 'Input submission Errors',
                'errors' => ['user' => 'Could Not Update User']
            ], 400);
    }

    /**
     * @param Request $request
     * @param string  $index
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAdminImg(Request $request, $index)
    {
        $adminHelper = $this->adminHelper;

        $fileInfo = $request->all();
        $validator = Validator::make($fileInfo, [
            'uuid' => 'required',
            'originalUrl' => 'required',
            'crop' => 'present',
        ]);

        $validator->after(function($validator) use ($adminHelper, $index) {
            if (empty($adminHelper->getPositionByIndex($index))) {
                $validator->errors()->add('error', 'Invalid Request');
            }
        });

        $errors = $validator->errors();
        if ($errors && $errors->get('error')) {
            return response()
                ->json([
                    'message' => 'Input submission Errors',
                    'errors' => $errors->get('error')
                ],400);
        }

        $completed = $adminHelper->updateImgPositionViaUCInfo($fileInfo, $index);
        $position = $adminHelper->getPositionByIndex($index);
        if ($completed) {
            return response()
                ->json([
                    'success' => "Success! {$position['title']} Image Profile Updated",
                    'imgMeta' => $position['img']['uc_meta']
                ], 200);
        }

        return response()
            ->json([
                'message' => 'Input submission Errors',
                'errors' => ['user' => 'Could Not Update Profile Image']
            ], 400);
    }

    /**
     * @param Request $request
     * @param string  $index
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetAdminImg(Request $request, $index)
    {
        $adminHelper = $this->adminHelper;

        $validator = Validator::make($request->all(), [
            'token-hidden' => 'required',
        ]);

        $token = $request->get('token-hidden');

        $position = $adminHelper->getPositionByIndex($index);
        $validator->after(function($validator) use ($adminHelper, $position, $token) {
            if (!$adminHelper->isTokenValid($token)) {
                $validator->errors()->add('token', 'Authentication Token Has Expired');
            }

            if (empty($position)) {
                $validator->errors()->add('index', 'Invalid Request. Position No longer Exist');
            }
        });

        if ($validator->fails()) {
            return redirect('/admin')
                ->withErrors($validator);
        }

        $adminHelper->resetImgInfo($index);

        return redirect("/admin/edit?token={$token}");
    }
}
