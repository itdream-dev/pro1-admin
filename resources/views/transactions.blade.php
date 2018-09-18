<?php
/******************************************************
 * IM - Vocabulary Builder
 * Version : 1.0.2
 * Copyright© 2016 Imprevo Ltd. All Rights Reversed.
 * This file may not be redistributed.
 * Author URL:http://imprevo.net
 ******************************************************/
?>
@extends('layouts.app')

@section('content')
        <section role="main" class="content-body">
            <header class="page-header">
                <h2>Transactions</h2>
                <span class="ether_unit" style="width:200px; font-size:20px;color:#fff;line-height:50px;position:absolute;left:40%; margin-left:-75px"></span>
                <span class="btc_unit" style="width:200px; font-size:20px;color:#fff;line-height:50px;position:absolute;left:60%; margin-left:-75px"></span>
            </header>
            <div class="panel-body" id="pageDocument">
                <form id="search-form-transaction" method="GET" action="" style="width:100%">
                <div class="row" style="padding-bottom:20px">
                  <div class="col-xl-3 col-lg-6 notecom">
                    <div class="form-group row">
                      <!-- <label class="col-lg-2 control-label text-lg-right pt-2" style="font-size:20px;"></label> -->
                      <div class="col-lg-12">
                        <div class="input-daterange input-group" data-plugin-datepicker>
                          <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </span>
                          <input type="text" class="form-control" name="transaction_period_start" id="transaction_period_start" value="{{$transaction_period_start}}">
                          <span class="input-group-addon">To</span>
                          <input type="text" class="form-control" name="transaction_period_end" id="transaction_period_end" value="{{$transaction_period_end}}">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-1 col-lg-2 notecom">
                    <button class="btn btn-primary" name="btnsubmit" type="submit" value="ticket">Search</button>
                  </div>
                  <div class="col-xl-6 col-lg-4 notecom">
                  </div>
                  <div class="col-xl-2 col-lg-4 notecom">
                    <button type="button" class="btn btn-primary" style="float:right" onclick="ExportTransactions()">Export CSV</button>
                  </div>
                </div>
               </form>
                <table class="table table-bordered table-striped mb-none" id="datatable-editable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>User</th>
                        <th>Amount</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($transactions as $item)
                        <tr id="{{$item->id}}">
                            <td>{{$item->id}}</td>
                            <td>{{$item->type}}</td>
                            <td>{{$item->user->id}}</td>
                            <td>{{$item->amount}}</td>
                            <td>{{$item->from_address}}</td>
                            <td>{{$item->to_address}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->status}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$transactions->links()}}
            </div>
        </section>
    <script>
        function remove(id) {
          res = confirm("Do you really want to delete this item?");
          if (res){
            $.ajax({
              url:'/transactions/' + id,
              type:'delete'
            }).then(function(ret){
                console.log(ret);
                location.href = "{{$transactions->url($transactions->currentPage())}}"
            }, function(err){
                console.log(err);
            })
          }
        }

        $(document).ready(function(){
          jQuery.get('https://api.coinmarketcap.com/v1/ticker/ethereum/', function(data, status){
            $('.ether_unit').html('1ETH = $' + parseFloat(data[0].price_usd).toFixed(2));
          });

          jQuery.get('https://api.coinmarketcap.com/v1/ticker/bitcoin/', function(data, status){
            $('.btc_unit').html('1BTC = $' + parseFloat(data[0].price_usd).toFixed(2));
          });
        });

        function ExportTransactions(){
          start_date = $('#transaction_period_start').val();
          end_date = $('#transaction_period_end').val();
          url = '/transactions/exportCSV?start_date='+start_date+'&&end_date='+end_date;
          location.href = url;
        }
    </script>
@endsection
