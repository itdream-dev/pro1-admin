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
use App\Wallet;

class WalletController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function wallets(Request $request)
  {

    $wallets = Wallet::paginate(50);

    return view('wallets', [
      'wallets' => $wallets,
    ]);
  }

}
