@extends('layouts.app')

@section('content')
<section role="main" class="content-body">
  <header class="page-header">
    <h2>Dashboard </h2>
    <span class="ether_unit" style="width:200px; font-size:20px;color:#fff;line-height:50px;position:absolute;left:40%; margin-left:-75px"></span>
    <span class="btc_unit" style="width:200px; font-size:20px;color:#fff;line-height:50px;position:absolute;left:60%; margin-left:-75px"></span>
  </header>

  <!-- start: page -->
  <div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
      <div class="row">
        <div class="col-md-12 col-lg-6 col-xl-4">
          <section class="panel panel-featured-left panel-featured-secondary">
            <div class="panel-body">
              <div class="widget-summary">
                <div class="widget-summary-col widget-summary-col-icon">
                  <div class="summary-icon bg-secondary">
                    <i class="fa fa-exchange"></i>
                  </div>
                </div>
                <div class="widget-summary-col">
                  <div class="summary">
                    <h4 class="title">Total Transactions</h4>
                    <div class="info">
                      <strong class="amount">0</strong>
                    </div>
                  </div>
                  <div class="summary-footer">
                    <a class="text-muted text-uppercase">more</a>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-4">
          <section class="panel panel-featured-left panel-featured-secondary">
            <div class="panel-body">
              <div class="widget-summary">
                <div class="widget-summary-col widget-summary-col-icon">
                  <div class="summary-icon bg-secondary">
                    <i class="fa fa-exchange"></i>
                  </div>
                </div>
                <div class="widget-summary-col">
                  <div class="summary">
                    <h4 class="title">Monthly Transactions</h4>
                    <div class="info">
                      <strong class="amount">0</strong>
                    </div>
                  </div>
                  <div class="summary-footer">
                    <a class="text-muted text-uppercase">more</a>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-4">
          <section class="panel panel-featured-left panel-featured-secondary">
            <div class="panel-body">
              <div class="widget-summary">
                <div class="widget-summary-col widget-summary-col-icon">
                  <div class="summary-icon bg-secondary">
                    <i class="fa fa-exchange"></i>
                  </div>
                </div>
                <div class="widget-summary-col">
                  <div class="summary">
                    <h4 class="title">Today Transactions</h4>
                    <div class="info">
                      <strong class="amount">0</strong>
                    </div>
                  </div>
                  <div class="summary-footer">
                    <a class="text-muted text-uppercase">more</a>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    <div class="col-md-12 col-lg-12 col-xl-12" style="margin-top:50px">
      <div class="row">
        <div class="col-md-12 col-lg-6 col-xl-6">
          <section class="panel">
            <header class="panel-heading" style="background-color:#489168">
              <h2 class="panel-title" style="color:#fff">Latest Transactions</h2>
            </header>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table mb-none">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Type</th>
                      <th>User</th>
                      <th>CMPCO Amount</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- <tr>
                      <td>15125125</td>
                      <td>Sent</td>
                      <td>skyclean</td>
                      <td>500</td>
                      <td>2018-08-31</td>
                    </tr>
                    <tr>
                      <td>15125124</td>
                      <td>Received</td>
                      <td>Mark</td>
                      <td>400</td>
                      <td>2018-08-28</td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
            </div>
          </section>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-6">
          <section class="panel">
            <header class="panel-heading" style="background-color:#489168">
              <h2 class="panel-title" style="color:#fff">Top Balances</h2>
            </header>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table mb-none">
                  <thead>
                    <tr>
                      <th>Owner</th>
                      <th>Wallet Id</th>
                      <th>Wallet Address</th>
                      <th>Balance</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- <tr>
                      <td>skyclean</td>
                      <td>b8c5816e-46cd-4050-84f7-13eec9082d8b</td>
                      <td>12R5wcyyFcqbJZHh4A1Jzp8FxkPHx8ozpJ</td>
                      <td>1050 CMPCO</td>
                    </tr>
                    <tr>
                      <td>Mark</td>
                      <td>d8c5816e-46cd-4050-84f7-13eec9082d8b</td>
                      <td>12D5wcyyFcqbJZHh4A1Jzp8FxkPHx8ozpJ</td>
                      <td>800 CMPCO</td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>


    <!-- end: page -->
  </section>
  <script>
  $(document).ready(function(){
    jQuery.get('https://api.coinmarketcap.com/v1/ticker/ethereum/', function(data, status){
      $('.ether_unit').html('1ETH = $' + parseFloat(data[0].price_usd).toFixed(2));
    });

    jQuery.get('https://api.coinmarketcap.com/v1/ticker/bitcoin/', function(data, status){
      $('.btc_unit').html('1BTC = $' + parseFloat(data[0].price_usd).toFixed(2));
    });
  });


  </script>
  @endsection
