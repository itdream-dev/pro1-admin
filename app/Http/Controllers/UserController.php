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
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use Illuminate\Support\Facades\DB;
use Log;
class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function users(Request $request)
  {
    $query = $request->input('query');
    if($query == null)
    $query = '';

    $users = User::where('email', 'like', '%'.$query.'%')->paginate(50);

    return view('users', [
      'users' => $users,
      'search' => $query,
    ]);
  }

  public function newUser()
  {
    return view('userEdit', [
      'user' => array('id'=>null, 'name'=>'', 'email'=>'', 'permission'=>0, 'is_enabled'=>1)
    ]);
  }

  public function editUser(Request $request, $id)
  {
    return view('userEdit', [
      'user' => User::findOrNew($id)
    ]);
  }

  public function postEdit(Request $request)
  {
    $user=[];
    if($request->input('id') != '') {
      $user = User::findOrNew($request->input('id'));
      if(!$request->input('name')) {
        $pos = stripos($request->input('email'),"@");
        $userName =  substr($request->input('email'), 0, $pos);
      } else {
        $userName = $request->input('name');
      }

      $user->name = $userName;

      if ($request->input('isResetPassword'))
      {
        $user->password = bcrypt($request->input('reset_password'));
      }
      Log::info('is_enabled - '.$request->input('is_enabled_value'));
      $user->is_enabled = $request->input('is_enabled_value');

      $user->save();
    } else {
      $exists = User::where('email', $request->input('email'))->get();
      if(sizeof($exists) > 0) {
        return Redirect::back()->withErrors("This email already used.");
      }
      $userName = "";

      if(!$request->input('name')) {
        $pos = stripos($request->input('email'),"@");
        $userName =  substr($request->input('email'), 0, $pos);
      } else {
        $userName = $request->input('name');
      }

      $user = User::create([
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
        'name' => $userName,
        'is_enabled' => 1
      ]);
    }
    return redirect()->to('users');
  }

  public function destroy($id)
  {
    $u = User::findOrNew($id);
    //$this->authorize('destroy', $category);
    //Cat::destroy([$category]);
    $u->delete();
    $ret = array("result"=>"ok");
    return json_encode($ret);
  }
}
