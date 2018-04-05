<!--START for model based searching
 
<a href="<?=SITE_URL?>sell-my-mobile"><div class="bg img-responsive"></div></a>-->
<!--<div class="img-responsive" style="background-image: url('<?=SITE_URL?>images/showcase/FinalBanner2.gif'); height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover;"></div>-->
<section><img class="img-responsive" src="<?=SITE_URL?>images/showcase/FinalBanner2.gif" alt="R3UPNOW"></section>  
   <?php
  //START for call us banner
  if($site_phone) { ?>
  <section class="call-block">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <p>Questions with your order?</p>
        </div>
        <div class="col-md-4">
          <a class="pull-right" href="tel:<?=$site_phone?>">Call us <?=$site_phone?></a>
        </div>
      </div>
    </div>
  </section>
  <?php
  } //END for call us banner ?>

  <?php   
  //Fetching devices
  //Get data from admin/include/functions.php, get_device_data_list function
  $device_data_list = get_device_data_list();
  $num_of_device = count($device_data_list);
  if($num_of_device>0) { ?>

   <section class="items-phone <?=($num_of_device<=2?'products-items-middle':'')?>">
 
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="head text-center">
            <div class="h3">Best Place To Sell</div>
            <div class="h3"><strong>Apple Products and Other Devices</strong></div>
          </div>
        </div>
      </div>
      <div class="row">
	  	<?php
		foreach($device_data_list as $device_data) { ?>
        <div class="col-md-4 col-sm-6">
          <a class="item clearfix" href="<?=$device_data['sef_url']?>">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4 col-xs-6">
                  <div class="h4"><strong><?=$device_data['brand_title']?></strong></div>
                  <p><?=$device_data['title']?></p>
                  <div><div class="btn get-paid" href="<?=$device_data['sef_url']?>">Get Paid</div></div>
                  <div><div class="btn item-more-btn" href="<?=$device_data['sef_url']?>"><i class="fa fa-angle-right" aria-hidden="true"></i></div></div>
                </div>
				<?php
				if($device_data['device_img']) {
				$device_img_path = SITE_URL.'libraries/phpthumb.php?imglocation='.SITE_URL.'images/device/'.$device_data['device_img'].'&h=144'; ?>
                <div class="col-md-8 col-xs-6">
                  <div class="item-image">
				    <img src="<?=$device_img_path?>" alt="<?=$device_data['title']?>">
                  </div>
                </div>
				<?php
				} ?>
              </div>
            </div>
          </a>
        </div>
		<?php
		} ?>
      </div>
      <div class="row"></div>
    </div>
  </section>
  <hr style="border-top: 1px solid #ccc;">
   <!--START for "How its work steps"-->
  <section class="how-work">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="head clearfix text-center"><div class="h2">How <strong>It Works!</strong></div></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="work-step text-center clearfix">
            <div class="work-step-round">
              <div class="work-step-round-2">
                <img src="images/icon/pc_icon.png" alt="">
                <span class="badge"><strong>1</strong></span>
              </div>
            </div>
            <div class="h3">Find Your Device & Get an <strong>Instant Price Quote</strong></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-step text-center clearfix">
            <div class="work-step-round">
              <div class="work-step-round-2">
                <img src="images/icon/phone_icon.png" alt="">
                <span class="badge"><strong>2</strong></span>
              </div>
            </div>
            <div class="h3"><strong>Send Us Your Device</strong> Using the Provided Shipping Label</div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-step text-center clearfix">
            <div class="work-step-round">
              <div class="work-step-round-2">
                <img src="images/icon/hand_icon.png" alt="">
                <span class="badge"><strong>3</strong></span>
              </div>
            </div>
            <div class="h3"><strong>Get Paid Fast!</strong> via Paypal, Check or Bank Transfer.</div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <?php
  }

  //Get data from admin/include/functions.php, get_top_seller_data_list function
  $top_seller_data_list = get_top_seller_data_list($top_seller_limit);
  $num_of_top_seller = count($top_seller_data_list);
  if($top_seller_limit>0 && $num_of_top_seller>0) { ?>
  <hr style="border-top: 1px solid #ccc;">
  <section class="seller">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="head text-center clearfix">
            <div class="h2">Top <strong>Seller</strong></div>
          </div>
        </div>
      </div>
      <div class="row seller-items">
	  	<div class="light-slider">
	  	<?php
		$ts_i=1;
		foreach($top_seller_data_list as $top_seller_data) {
		  $ts_storage_list = json_decode($top_seller_data['storage']);
		  foreach($ts_storage_list as $ts_storage) {
		  	$num_of_top_seller = $ts_i;
			if($num_of_top_seller<=$top_seller_limit) { ?>
			<div class="col-md-4">
			  <a class="block clearfix" href="<?=$top_seller_data['sef_url'].'/'.createSlug($top_seller_data['model_title']).'/'.$top_seller_data['id'].'/'.$ts_storage->storage_size?>">
			    <?php
				if($top_seller_data['device_img']) {
					$md_img_path = SITE_URL.'libraries/phpthumb.php?imglocation='.SITE_URL.'images/mobile/'.$top_seller_data['model_img'].'&h=178'; ?>
					<img src="<?=$md_img_path?>">
				<?php
				} ?>
  				<div class="text"><?=$top_seller_data['brand_title']?></div>
  				<div class="text"><?=$top_seller_data['device_title']?></div>
  				<div class="text"><strong><?=$ts_storage->storage_size?></strong></div>
  				<div class="text btn btn-sell"><?=$ts_i?></div>
  				<div class="more"><div class="btn"><i class="fa fa-angle-right" aria-hidden="true"></i></div></div>
			  </a>
			</div>
		 <?php
		 }
		 $ts_i = $ts_i+1;
		 }
		} ?>
		</div>
      </div>
    </div>
  </section>

  <?php
  } //END for brand section ?>
  
  <!--START for review section-->
  <hr style="border-top: 1px solid #ccc;">
  <section class="reviews">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="head text-center clearfix">
            <div class="h2">Latest <strong>Reviews</strong></div>
            <p>What customer say ?</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="block clarfix">
            <div class="rev-block">
              <p>Lorem ipsum dolor sit amet, onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <div class="rev-com-name"><strong>Booking.com</strong></div>
              <div class="arrow-down"></div>
            </div>
            <div class="rev-bottom"><img src="images/review/1.png"><div class="text">John Doe<br /><span>CEO</span></div></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="block active clarfix">
            <div class="rev-block">
              <p>Lorem ipsum dolor sit amet, onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <div class="rev-com-name"><strong>Booking.com</strong></div>
              <div class="arrow-down"></div>
            </div>
            <div class="rev-bottom"><img src="images/review/2.png"><div class="text">Airnbnb<br /><span>CEO</span></div></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="block clarfix">
            <div class="rev-block">
              <p>Lorem ipsum dolor sit amet, onsectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <div class="rev-com-name"><strong>Booking.com</strong></div>
              <div class="arrow-down"></div>
            </div>
            <div class="rev-bottom"><img src="images/review/3.png"><div class="text">John Doe<br /><span>CEO</span></div></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="text-center">
            <a class="btn-general" href="<?=SITE_URL?>reviews">View all</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--END for review section-->
  
  <!--START for quote section, it will search based on make, device & model-->
  <hr style="border-top: 1px solid #ccc;">
  <section class="quota">
    <a name="request_quote"></a>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="head text-center clearfix">
            <div class="h2">Get a <strong>Quote</strong></div>
            <h3>Select your device below to find out how much you'll get for it...</h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center clarfix">
            <form action="controllers/home.php" method="post">
			  <div class="form-group">
                <label for="quote_make">Make</label>
                <select class="selectpicker" name="quote_make" id="quote_make" onchange="getQuoteDevice(this.value);">
                  <option value="">Please Choose</option>
                  <?php
				  $quote_mk_list = autocomplete_data_search()['quote_mk_list'];
				  foreach($quote_mk_list as $quote_mk_key=>$quote_mk_data) { ?>
                  <option value="<?=$quote_mk_key?>"><?=$quote_mk_data?></option>
				  <?php
				  } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="quote_device">Device</label>
                <select class="selectpicker add-quote-device" name="quote_device" id="quote_device" onchange="getQuoteModel(this.value);">
                  <option value="">Please Choose</option>
                </select>
              </div>
              <div class="form-group">
                <label for="quote_model">Model</label>
                <select class="selectpicker add-quote-model" name="quote_model" id="quote_model">
                  <option value="">Please Choose</option>
                </select>
              </div>
              <button type="submit" class="btn" name="submit_quote">How Much?</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--END for quote section, it will search based on make, device & model-->
 
<script>
function getQuoteDevice(val)
{
	var brand_id = val.trim();
	if(brand_id) {
		post_data = "brand_id="+brand_id+"&token=<?=uniqid();?>";
		jQuery(document).ready(function($){
			$.ajax({
				type: "POST",
				url:"ajax/get_quote_device.php",
				data:post_data,
				success:function(data) {
					if(data!="") {
						console.log(data);
						$('#quote_device').html(data);
						$('.add-quote-device').selectpicker('refresh');

						$('#quote_model').html('<option value="">Please Choose</option>');
						$('.add-quote-model').selectpicker('refresh');
					} else {
						alert('Something wrong so please try again...');
						return false;
					}
				}
			});
		});
	}
}

function getQuoteModel(val)
{
	var device_id = val.trim();
	if(device_id) {
		post_data = "device_id="+device_id+"&token=<?=uniqid();?>";
		jQuery(document).ready(function($){
			$.ajax({
				type: "POST",
				url:"ajax/get_quote_model.php",
				data:post_data,
				success:function(data) {
					if(data!="") {
						console.log(data);
						$('#quote_model').html(data);
						$('.add-quote-model').selectpicker('refresh');
					} else {
						alert('Something wrong so please try again...');
						return false;
					}
				}
			});
		});
	}
}
</script>