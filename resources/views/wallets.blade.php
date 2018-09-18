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
                <h2>Wallets management</h2>
                <span class="ether_unit" style="width:200px; font-size:20px;color:#fff;line-height:50px;position:absolute;left:40%; margin-left:-75px"></span>
                <span class="btc_unit" style="width:200px; font-size:20px;color:#fff;line-height:50px;position:absolute;left:60%; margin-left:-75px"></span>
            </header>
            <div class="panel-body" id="pageDocument">
                <table class="table table-bordered table-striped mb-none" id="datatable-editable">
                    <thead>
                    <tr>
                        <th>Wallet-ID</th>
                        <th>Wallet Address</th>
                        <th>Owner</th>
                        <th>CMPCO Balance</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($wallets as $wallet)
                        <tr id="{{$wallet->id}}">
                            <td>{{$wallet->id}}</td>
                            <td>{{$wallet->address}}</td>
                            <td>{{$wallet->user->name}}</td>
                            <td>0</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $wallets->links() }}
            </div>
        </section>
    <script>

        $(document).ready(function(){
          jQuery.get('https://api.coinmarketcap.com/v1/ticker/ethereum/', function(data, status){
            var price = data[0].price_usd;
            $('.ether_unit').html('1ETH = $' + parseFloat(price).toFixed(2));
          });

          jQuery.get('https://api.coinmarketcap.com/v1/ticker/bitcoin/', function(data, status){
            var price = data[0].price_usd;
            $('.btc_unit').html('1BTC = $' + parseFloat(price).toFixed(2));
          });
        });
    </script>
@endsection
