<?php

namespace App\Http\Controllers;

/******************************************************
 * IM - Vocabulary Builder
 * Version : 1.0.2
 * Copyright© 2016 Imprevo Ltd. All Rights Reversed.
 * This file may not be redistributed.
 * Author URL:http://imprevo.net
 ******************************************************/

use App\User;
use App\Generalsetting;
use App\Securitysetting;
use App\Coin;
use Validator;
use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Redirect;
use Input;
use Reminder;
use Mail;
use Session;
use Log;
use File;

class SettingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function general_settings()
    {



		$codeList = Generalsetting::all();
		$settings = [];
		for($i = 0; $i < count($codeList); $i++) {
			$settings[$codeList[$i]["name"]] = $codeList[$i]["value"];
		}

    	return view('general_settings', ['settings'=>$settings]);
    }

    public function security_settings()
    {
		      $codeList = Securitysetting::all();

		      $settings = [];
		      for($i = 0; $i < count($codeList); $i++) {
			       $settings[$codeList[$i]["name"]] = $codeList[$i]["value"];
		      }
    	    return view('security_settings', ['settings'=>$settings]);
    }

    public function postGeneralSetting(Request $request)
    {
        $code = Generalsetting::firstOrCreate(["name" => "contact_email"]);
        $code->value = $request->get('contact_email');
        $code->save();

        $code = Generalsetting::firstOrCreate(["name" => "facebook"]);
        $code->value = $request->get('facebook');
        $code->save();

        $code = Generalsetting::firstOrCreate(["name" => "twitter"]);
        $code->value = $request->get('twitter');
        $code->save();

        $code = Generalsetting::firstOrCreate(["name" => "reddit"]);
        $code->value = $request->get('reddit');
        $code->save();

        $code = Generalsetting::firstOrCreate(["name" => "discord"]);
        $code->value = $request->get('discord');
        $code->save();

        $code = Generalsetting::firstOrCreate(["name" => "lang"]);
        $code->value = $request->get('lang');
        $code->save();

        return back()->with('success',"Settings have been successfully saved.");
        //return Redirect::route('admin.setting');
    }

    public function postSecuritySetting(Request $request)
    {
        $code = Securitysetting::firstOrCreate(["name" => "2fa_enabled"]);
        $code->value = $request->get('2fa_enabled');
        $code->save();

        $code = Securitysetting::firstOrCreate(["name" => "password_hit_enabled"]);
        $code->value = $request->get('password_hit_enabled');
        $code->save();

        $code = Securitysetting::firstOrCreate(["name" => "second_password_enabled"]);
        $code->value = $request->get('second_password_enabled');
        $code->save();

        $code = Securitysetting::firstOrCreate(["name" => "ip_compare_enabled"]);
        $code->value = $request->get('ip_compare_enabled');
        $code->save();

        $code = Securitysetting::firstOrCreate(["name" => "auto_logout_enabled"]);
        $code->value = $request->get('auto_logout_enabled');
        $code->save();


        return back()->with('success',"Settings have been successfully saved.");
        //return Redirect::route('admin.setting');
    }
}
