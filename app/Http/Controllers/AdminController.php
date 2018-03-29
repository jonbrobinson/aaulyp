<?php

namespace App\Http\Controllers;

use App\Aaulyp\Services\AdminHelper;
use App\Aaulyp\Services\Emailer;
use App\Aaulyp\Tools\Toolbox;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{

    protected $toolBox;
    protected $emailer;

    /**
     * AdminController constructor.
     *
     * @param Toolbox $toolbox
     * @param Emailer $emailer
     */
    public function __construct(Toolbox $toolbox, Emailer $emailer)
    {
        $this->middleware('auth', ['except' => ['fetchToken', 'generateToken', 'editAdmin', 'updateAdminPosition']]);
        parent::__construct();

        $this->toolBox = $toolbox;
        $this->emailer = $emailer;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function generateToken()
    {
        return view('pages.admin.tokenRequest', ['successMessage' => null]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function fetchToken(Request $request)
    {
        $adminHelper = new AdminHelper($this->toolBox);

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

        return view('pages.admin.tokenRequest', ["successMessage" => "Success!. Please Check Your email for your token"]);
    }

    public function editAdmin(Request $request)
    {
        $adminHelper = new AdminHelper($this->toolBox);

        $token = $request->input('token');
        $validator = Validator::make(['token' => $token], [
            'token' => 'required',
        ]);

        $validator->after(function($validator) use ($adminHelper, $token) {
            if (!$adminHelper->isTokenValid($token)) {
                $validator->errors()->add('token', 'Authentication Token Has Expired');
            }
        });

        if ($validator->fails()) {
            return redirect('/admin')
                ->withErrors($validator);
        }

        $officers = $adminHelper->getSortedPositionsByType('officer');
        $chairs = $adminHelper->getSortedPositionsByType('chair');

        return view('pages.update_positions', ["chairs" => $chairs, "officers" => $officers]);
    }

    public function updateAdminPosition(Request $request)
    {
        $adminHelper = new AdminHelper($this->toolBox);

        $token = $request->get('token-hidden');
        $updatedUser = $request->all();
        $validator = Validator::make($updatedUser, [
            'first_name' => 'required',
            'last_name' => 'required',
            'title' => 'required',
            'email' => 'required',
            'index' => 'required',
            'about' => 'present',
            'description' => 'present',
            'social-twitter' =>'present',
            'social-facebook' => 'present',
            'social-linkedin' => 'present',
            'token->hidden' => 'present'
        ]);

        $validator->after(function($validator) use ($adminHelper, $token) {
            if (!$adminHelper->isTokenValid($token)) {
                $validator->errors()->add('token', 'Authentication Token Has Expired');
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

        $completed = $adminHelper->updatePositionViaFormUser($updatedUser);

        if ($completed) {
            return response()
                ->json([
                    'success' => 'User Updated',
                    'user' => $adminHelper->getPositionByIndex($updatedUser['index'])
                ], 200);
        }

        return response()
            ->json([
                'message' => 'Input submission Errors',
                'errors' => ['user' => 'Could Not Update User']
            ], 400);
    }
}
