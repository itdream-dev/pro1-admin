@extends('layouts.app')

@section('content')
<style>
.userinfolabel {
  font-size:20px;
}
</style>
<section role="main" class="content-body">
  <header class="page-header">
    <h2>Security Settings</h2>
    <span class="ether_unit" style="width:200px; font-size:20px;color:#fff;line-height:50px;position:absolute;left:40%; margin-left:-75px"></span>
    <span class="btc_unit" style="width:200px; font-size:20px;color:#fff;line-height:50px;position:absolute;left:60%; margin-left:-75px"></span>
  </header>

  <!-- start: page -->
  <div class="row">
    <section class="panel">
      <header class="panel-heading">
        <h2 class="panel-title">Security Settings</h2>
      </header>
      <div class="panel-body">
        @include('common.errors')
						<form id="settingForm" role="form" class="form-horizontal form-bordered" action="/security_settings" method="post">
							<div id="save-result-div" class="row" style="display:none;z-index:2;position:absolute; overflow:visible;  left:35%; top:10px;border-radius:8px; width:35%; height:60px; background-color:#dff0d8">
										<div class="col-md-11" style="padding-top:15px; text-align:center; ">
											<span style="font-weight:bold; font-size:16px; color:#3c763d;">Settings has been successfully saved.</span>
										</div>
										<div class="col-md-1" style="padding-top:15px;float:right">
											<i aria-hidden="true" class="fa fa-close" onclick="closeSave(event)" style="float:right;"></i>
									  </div>
							</div>
              <div class="form-group">
								<label class="col-md-3 control-label label-left" for="2fa_enabled">Enable 2fa?</label>
								<div class="col-md-6">
									<div class="switch switch-primary">
										<input type="checkbox" id="2fa_enabled" name="2fa_enabled" onchange="Enable2fa()" value='0' data-plugin-ios-switch @if($settings['2fa_enabled']) checked="checked" @endif/>
									</div>
								</div>
							</div>
              <div class="form-group">
								<label class="col-md-3 control-label label-left" for="auto_logout_enabled">Enable Auto Logout?</label>
								<div class="col-md-6">
									<div class="switch switch-primary">
										<input type="checkbox" id="auto_logout_enabled" name="auto_logout_enabled" onchange="EnableAutoLogout()" value='0' data-plugin-ios-switch @if($settings['auto_logout_enabled']) checked="checked" @endif/>
									</div>
								</div>
							</div>
              <div class="form-group">
								<label class="col-md-3 control-label label-left" for="ip_compare_enabled">Enable IP Compare?</label>
								<div class="col-md-6">
									<div class="switch switch-primary">
										<input type="checkbox" id="ip_compare_enabled" name="ip_compare_enabled" onchange="EnableIPCompare()" value='0' data-plugin-ios-switch @if($settings['ip_compare_enabled']) checked="checked" @endif/>
									</div>
								</div>
							</div>

              <div class="form-group">
								<label class="col-md-3 control-label label-left" for="password_hit_enabled">Enable Password Hint?</label>
								<div class="col-md-6">
									<div class="switch switch-primary">
										<input type="checkbox" id="password_hit_enabled" name="password_hit_enabled" onchange="EnableHint()" value='0' data-plugin-ios-switch @if($settings['password_hit_enabled']) checked="checked" @endif/>
									</div>
								</div>
							</div>

              <div class="form-group">
                <label class="col-md-3 control-label label-left" for="save"></label>
                <div class="col-md-6">
                  <button type="submit" class="btn btn-primary" style="width:120px">Save</button>
                </div>
              </div>
            </form>
      </div>
    </section>
  </div>
  <!-- end: page -->
</section>
<script>
@if ($message = Session::get('success'))
  document.getElementById('save-result-div').style.display = 'inline';
@endif

function Enable2fa(){
  value = document.getElementById('2fa_enabled').checked;
  if (value == true)
  {
    document.getElementById('2fa_enabled').value = 1;
  }
  else
  {
    document.getElementById('2fa_enabled').value = 0;
  }
}

function EnableAutoLogout(){
  value = document.getElementById('auto_logout_enabled').checked;
  if (value == true)
  {
    document.getElementById('auto_logout_enabled').value = 1;
  }
  else
  {
    document.getElementById('auto_logout_enabled').value = 0;
  }
}

function EnableHint(){
  value = document.getElementById('password_hit_enabled').checked;
  if (value == true)
  {
    document.getElementById('password_hit_enabled').value = 1;
  }
  else
  {
    document.getElementById('password_hit_enabled').value = 0;
  }
}

function EnableIPCompare(){
  value = document.getElementById('ip_compare_enabled').checked;
  if (value == true)
  {
    document.getElementById('ip_compare_enabled').value = 1;
  }
  else
  {
    document.getElementById('ip_compare_enabled').value = 0;
  }
}

function closeSave(e)
{
   document.getElementById('save-result-div').style.display = 'none';
}
$(document).ready(function(){
  jQuery.get('https://api.coinmarketcap.com/v1/ticker/ethereum/', function(data, status){
    $('.ether_unit').html('1ETH = $' + parseFloat(data[0].price_usd).toFixed(2));
  });
});

$(document).ready(function(){
  jQuery.get('https://api.coinmarketcap.com/v1/ticker/bitcoin/', function(data, status){
    $('.btc_unit').html('1BTC = $' + parseFloat(data[0].price_usd).toFixed(2));
  });
});
</script>
@endsection
