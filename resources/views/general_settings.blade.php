@extends('layouts.app')

@section('content')
<style>
.userinfolabel {
  font-size:20px;
}
</style>
<section role="main" class="content-body">
  <header class="page-header">
    <h2>General Settings</h2>
    <span class="ether_unit" style="width:200px; font-size:20px;color:#fff;line-height:50px;position:absolute;left:40%; margin-left:-75px"></span>
    <span class="btc_unit" style="width:200px; font-size:20px;color:#fff;line-height:50px;position:absolute;left:60%; margin-left:-75px"></span>
  </header>

  <!-- start: page -->
  <div class="row">
    <section class="panel">
      <header class="panel-heading">
        <h2 class="panel-title">General Settings</h2>
      </header>
      <div class="panel-body">
        @include('common.errors')
						<form id="settingForm" role="form" class="form-horizontal form-bordered" action="/general_setting" method="post">
							<div id="save-result-div" class="row" style="display:none;z-index:2;position:absolute; overflow:visible;  left:35%; top:10px;border-radius:8px; width:35%; height:60px; background-color:#dff0d8">
										<div class="col-md-11" style="padding-top:15px; text-align:center; ">
											<span style="font-weight:bold; font-size:16px; color:#3c763d;">Settings has been successfully saved.</span>
										</div>
										<div class="col-md-1" style="padding-top:15px;float:right">
											<i aria-hidden="true" class="fa fa-close" onclick="closeSave(event)" style="float:right;"></i>
									  </div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label label-left" for="contact_email">Contact Email<span class="required">*</span></label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="contact_email" name="contact_email" value="{{isset($settings['contact_email'])? $settings["contact_email"]:''}}" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label label-left" for="siteDesc">Facebook</label>
								<div class="col-md-6">
									<input type="text" class="form-control" id="facebook" name="facebook" value="{{isset($settings['facebook'])? $settings["facebook"]:''}}">
								</div>
							</div>
              <div class="form-group">
                <label class="col-md-3 control-label label-left" for="twitter">Twitter</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="twitter" name="twitter" value="{{isset($settings['twitter'])? $settings["twitter"]:''}}">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label label-left" for="reddit">Reddit</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="reddit" name="reddit" value="{{isset($settings['reddit'])? $settings["reddit"]:''}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label label-left" for="discord">Discord</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="discord" name="discord" value="{{isset($settings['discord'])? $settings["discord"]:''}}">
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
