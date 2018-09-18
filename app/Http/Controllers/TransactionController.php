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
use App\Transaction;
use App\Coin;
use Excel;

class TransactionController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function transactions(Request $request)
  {
    $start= $request->input('transaction_period_start');
    $end= $request->input('transaction_period_end');

    if (!$request->has('transaction_period_start') && !$request->has('transaction_period_end'))
    {
      $start = date('m/d/Y');
      $end = date('m/d/Y');
    }

    $transactions = Transaction::where(function($q) use($start, $end) {if ($start && $end) {$q->whereBetween('created_at',  [date('Y-m-d'.' 00:00:00', strtotime($start)), date('Y-m-d'.' 23:59:59', strtotime($end))]);}})->paginate(50);

    return view('transactions', [
      'transactions' => $transactions,
      'transaction_period_start' => $start,
      'transaction_period_end' => $end
    ]);
  }
  public function exportCSV(Request $request){
    $start = $request->input('transaction_period_start');
    $end = $request->input('transaction_period_end');
    $transactions = Transaction::where(function($q) use($start, $end) {if ($start && $end) {$q->whereBetween('created_at',  [date('Y-m-d'.' 00:00:00', strtotime($start)), date('Y-m-d'.' 23:59:59', strtotime($end))]);}})->get();

    Excel::create('export_transaction_csv_'.time(), function($excel) use($transactions) {
        $excel->sheet('ExportFile', function($sheet) use($transactions) {
            $sheet->fromArray($transactions);
        });
    })->export('csv');
  }
}
