<?php

namespace App\Http\Controllers;

use App\Aaulyp\Services\AdminHelper;
use App\Aaulyp\Services\Emailer;
use App\Aaulyp\Tools\Toolbox;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{

    protected $toolBox;
    protected $emailer;

    public function __construct(Toolbox $toolbox, Emailer $emailer)
    {
        $this->middleware('auth', ['except' => ['fetchToken', 'generateToken', 'editAdmin']]);
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
                $validator->errors()->add('email', 'Permission Denied: Access Not Allowed');
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

        return view('pages.board_import', ["chairs" => $chairs, "officers" => $officers]);
    }
}
