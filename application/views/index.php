<?php $CI =& get_instance(); ?>
	<!-- middle/main section starts here -->
	<section>
    	<header class="header-wrapper">
			<div class="left-section">
			    <div class="text-slider">
			        <ul class="rslides" id="slider1">
			            <li>
			                <h1>Home ownership</h1>
            				<h1>is not a birthright</h1> 
            				<h1>of a few.</h1>
            				<p>&nbsp;</p>
			            </li>
			            <li>
			                <h1>Buy a home</h1>
            				<h1>in Lagos</h1>
            				<h1>and pay in 5 years?</h1>
            				<p>We have a deal for you.</p>
			            </li>
    				</ul>
			    </div>
				<div class="form-section">
					<form action="<?php echo base_url('search-properties'); ?>" method="POST">
						<div class="custom-select">
							<select name="investment-type" class="investment-type">
    							<option value="">How do you want to start?</option>
    							<option value="5">Co-ownership</option>
    							<option value="6">BuyNowPayLater</option>
    							<option value="7">OwnNowPayLater</option>
							</select>
						</div>

						<div class="custom-select">
							<select>
								<option value="0">Location</option>
								<?php if(isset($locations) && !empty($locations)){ ?>
									<?php foreach($locations as $location => $value){ ?>
										<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
									<?php } ?>
								<?php } ?>
							</select>
						</div>
						<input type="hidden" id="search-location" name="location" />
						<!---<div class=""></div>--->
						<input type="submit" class="search-button" value="Search" />
					</form>
				</div>

			</div>
			<div style='background-image:url("<?php echo base_url(); ?>asset/img/home-banner-img.png");' class="right-section"></div>
		</header>

		<div class="section-word">
			<h1 style='text-align:center; padding-top:30px;'>The best mortgage alternative in Nigeria.</h1>
			<div style='margin:auto; text-align:center; max-width: 90%; padding:20px 0'>On BuySmallsmall buying a home is as straightforward as ordering your favorite food at a nice restaurant.</div>
		</div>
		<section class="product-card-container">

			<div class="product-card">
				<div style='background-image:url("<?php echo base_url(); ?>asset/img/btl-img.png")' class="top-section">
				</div>
				<div class="bottom-section">
					<h1>Buy2Let</h1>

					<div class="text-section">
						Own prime rental property of any type with 80% financing at zero percent interest.
					</div>

					<a class="learn-more-btn" href="<?php echo base_url('faq'); ?>"><span>Learn more</span> <i class="fa fa-arrow-right"></i> </a>
				</div>
			</div>

			<div class="product-card">
				<div style='background-image:url("<?php echo base_url(); ?>asset/img/cardImg2.png")' class="top-section">
				</div>
				<div class="bottom-section">
					<h1>Buy2Live</h1>
					<div class="text-section">
						Acquire your dream home today and pay for it conviniently in 5 years.
					</div>
					<a class="learn-more-btn" href="<?php echo base_url('faq'); ?>"><span>Learn more</span> <i class="fa fa-arrow-right"></i> </a>
				</div>
			</div>
			<!---<div class="product-card">
				<div style='background-image:url("<?php //echo base_url(); ?>asset/img/cardImg1.png")' class="top-section"></div>
				<div class="bottom-section">
					<h1>Buy2Sell</h1>
					<div class="text-section">
						Find real estate deals that give minimum of 25% return in 24months or less
					</div>
					<a class="learn-more-btn" href="#"><span>Learn more</span> <i class="fa fa-arrow-right"></i> </a>
				</div>
			</div>--->
		</section>

    	
        <div style="width:100%;">
    		<div class="stats-wrapper">
    			<h1 class="stats-pool-buy">Making Real Estate investment accessible to all</h1>
    			<p class="stats-text">How it works</p>
    			<div class="stats-paper-wrapper">
    				<div class="stats-paper">
    					<p class="stats-count-statement">Sole Ownership</p>
    					<table class="stat-table" width="100%">
    						<tr class="stat-tr">
    							<td class="stat-td" valign="top">&bull;</td>
    							<td class="stat-td" valign="top">
    								<span class="stat-sub-head">Choose a property</span>
    								<span class="stat-note">Select from our list of premium properties that match your investment apetite.</span>
    							</td>
    						</tr>
    						<tr class="stat-tr">
    							<td class="stat-td" valign="top">&bull;</td>
    							<td class="stat-td" valign="top">
    								<span class="stat-sub-head">Choose a Payment Plan</span>
    								<span class="stat-note">Select from the 3 payment plans available - BuyNowPayLater, OwnNow Pay Later, and OutrightBuy.</span>
    							</td>
    						</tr>
    						<tr class="stat-tr">
    							<td class="stat-td" valign="top">&bull;</td>
    							<td class="stat-td" valign="top">
    								<span class="stat-sub-head">Complete KYC form</span>
    								<span class="stat-note">We want tpo serve you better, but we need to know you better first.</span>
    							</td>
    						</tr>
    						<tr class="stat-tr">
    							<td class="stat-td" valign="top">&bull;</td>
    							<td class="stat-td" valign="top">
    								<span class="stat-sub-head">Make Payment</span>
    								<span class="stat-note">Use our payment gateway or make a direct transfer.</span>
    							</td>
    						</tr>
    					</table>
    				</div>
    				<div class="stats-paper">
    					<p class="stats-count-statement">Co-ownership</p>
    					<table class="stat-table" width="100%">
    						<tr class="stat-tr">
    							<td class="stat-td" valign="top">&bull;</td>
    							<td class="stat-td" valign="top">
    								<span class="stat-sub-head">Choose a property</span>
    								<span class="stat-note">Select from our list of best priced properties that are active</span>
    							</td>
    						</tr>
    						<tr class="stat-tr">
    							<td class="stat-td" valign="top">&bull;</td>
    							<td class="stat-td" valign="top">
    								<span class="stat-sub-head">Choose a subscription plan</span>
    								<span class="stat-note">Stack up your regular shares at your own pace or subscribe to our Shares Target Plans.</span>
    							</td>
    						</tr>
    						<tr class="stat-tr">
    							<td class="stat-td" valign="top">&bull;</td>
    							<td class="stat-td" valign="top">
    								<span class="stat-sub-head">Make Payment</span>
    								<span class="stat-note">Review all terms and make payment using our online payment gateway.</span>
    							</td>
    						</tr>
    						<tr class="stat-tr">
    							<td class="stat-td" valign="top">&bull;</td>
    							<td class="stat-td" valign="top">
    								<span class="stat-sub-head">Migrate to Sole Ownership</span>
    								<span class="stat-note">Convert your stacked shares as down-payment and become a sole-owner.</span>
    							</td>
    						</tr>
    					</table>
    				</div>
    			</div>
    		</div>
    		<div class="home-faq-btn"><a href="<?php echo base_url('faq'); ?>">See FAQs</a></div>
		</div>

		<div class="home-prop-wrapper">
			<h1 class="stats-pool-buy">Featured properties</h1>
			<!----Co own properties ---->
			<div class="feat-prop-wrapper">
				<div class="prop-option-head">
					<div class="prop-option-top">
						<span class="prop-class">Buy2Co-own</span>
						<span class="all-prop-btn"><a href="<?php echo base_url('properties/co-ownership'); ?>">Explore all</a></span>
					</div>
					<div class="prop-option-below">Stack up shares and become a sole-owner in 1 to 6 years.</div>
				</div>
				<div class="home-properties-container">
					
					<?php if(isset($pool_properties) && !empty($pool_properties)){ ?>

						

						<?php foreach($pool_properties as $pool_property => $pool_value){ ?>

							<?Php
							$bucket = 'dev-rss-uploads'; // Your bucket name

							// Include AWS SDK and create S3 client
							require 'vendor/autoload.php';
							$s3 = new Aws\S3\S3Client([
								'version' => 'latest',
								'region' => 'eu-west-1'
							]);

							?>
							
							
							<a href="<?php echo base_url()."co-own/".$pool_value['propertyID']; ?>" class="home-card">

								<div style="background-image: url('<?php echo 'https://'.$bucket.'.s3.amazonaws.com/uploads/buytolet/'.$pool_value['image_folder'].'/'.$pool_value['featured_image']; ?>')" class="top-section">
								<!-- <div style='background-image:url("</?php echo base_url(); ?>uploads/buytolet/</?php echo $pool_value['image_folder'].'/'.$pool_value['featured_image']; ?>")' class="top-section"> -->
									<div class="badge"><?php echo $pool_value['type']; ?></div>
									<?php if(@$pool_value['construction_lvl']){ ?>
						            <div class="badge-bottom"><?php echo $pool_value['construction_lvl']; ?></div>
						            <?php } ?>
								</div>


								<div class="bottom-section">
								    <div class="sale-status <?php echo strtolower($pool_value['availability']); ?>"><?php echo ($pool_value['availability'] == 'Available')? 'Buy now' : 'Sold out'; ?></div>
									
									<span class="price-type down-payment">Starting price</span>
									<h3 class="down-payment"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($pool_value['price']); ?><span style="display:inline-block;font-size:16px;line-height:27px"> / Share</span></h3>
									<p><?php echo $pool_value['property_name']; ?>. <?php echo $pool_value['propState']; ?></p>
									<ul class="pool-price-box">
									    <li class="pool-price-box-item">
									        <span class="price-type actual-price">Shares available</span>
									        <h3><?php echo number_format($pool_value['pool_units']); ?></h3>
									    </li>
									    <li class="pool-price-box-item">
									        <span class="price-type actual-price">Shares remaining</span>
									        <h3><?php echo number_format($pool_value['available_units']); ?></h3>
									    </li>
									</ul>
									<ul class="pool-price-box">
									    <li class="pool-price-box-item">
									        <span class="price-type actual-price">Property price</span>
									        <h3><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($pool_value['marketValue']); ?></h3>
									    </li>
									    <li class="pool-price-box-item">
									        &nbsp;
									    </li>
									</ul>
									
									<ul>
										<li style='list-style:none'>&bullet; <?php echo $pool_value['bed']; ?> bed</li>
										<li>&bullet; <?php echo $pool_value['bath']; ?> bathroom</li>
										<li>&bullet; <?php if(@$pool_value['property_size']){ echo number_format($pool_value['property_size']); } else { echo 0; } ?> sqm</li>
									</ul>
									<div class="key-values">
										<div>
											<span>Hold period</span>
											<h3><?php
											$returns = $pool_value['co_appr_1'] + $pool_value['co_appr_2'] + $pool_value['co_appr_3'] + $pool_value['co_appr_4'] + $pool_value['co_appr_5'] + $pool_value['co_appr_6'] +  $pool_value['co_rent_1'] + $pool_value['co_rent_2'] + $pool_value['co_rent_3'] + $pool_value['co_rent_4'] + $pool_value['co_rent_5'] + $pool_value['co_rent_6'];
											        if(@$pool_value['hold_period'] == 'One year'){
											            echo "1 year";
											            
											        }elseif(@$pool_value['hold_period'] == 'Two years'){
											            echo "2 years";
											            
											        }elseif(@$pool_value['hold_period'] == 'Three years'){
											            echo "3 years";
											            
											        }elseif(@$pool_value['hold_period'] == 'Four years'){
											            echo "4 years";
											            
											        }elseif(@$pool_value['hold_period'] == 'Five years'){
											            echo "5 years";
											            
											        }elseif(@$pool_value['hold_period'] == 'Six years'){
											            echo "6 years";
											            
											        }else{
											            echo @$pool_value['hold_period'];
											            
											        }
											    ?>
											    </h3>
										</div>
										<!---<div>
											<span>Shares remaining</span>
											<h3><?php //echo number_format($pool_value['available_units']); ?></h3>
										</div>--->
										<?php $asset_1 = ((($pool_value['asset_appreciation_1'] / 100) * $pool_value['marketValue']) + $pool_value['marketValue']); ?>
										<div>
											<span>Buyback rate <div class="tooltip"><i class="fa fa-info"></i><span class="propstooltiptext">Buyback rate for the entire hold period.</span></div></span>
											<h3><?php echo $returns; ?>%</h3>
										</div>
									</div>
								</div>
							</a>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
			
			<!---Co own properties ---->
			
			<!-----Buy to let properties ----->
			<div class="feat-prop-wrapper">
				<div class="prop-option-head">
					<div class="prop-option-top">
						<span class="prop-class">BuyNowPayLater</span>
						<span class="all-prop-btn"><a href="<?php echo base_url('properties/bnpl'); ?>">Explore all</a></span>
					</div>
					<div class="prop-option-below">Lock with just 5% fee, get 9% single interest rate for 5 years.</div>
				</div>
				<div class="home-properties-container">
					
				<?php if(isset($bnpl_properties) && !empty($bnpl_properties)){ ?>
						<?php foreach($bnpl_properties as $property => $value){ ?>
							<a href="<?php echo base_url()."property/".$value['propertyID']; ?>" class="home-card">
							<div style="background-image: url('<?php echo 'https://'.$bucket.'.s3.amazonaws.com/uploads/buytolet/'.$value['image_folder'].'/'.$value['featured_image']; ?>')" class="top-section">
								<!-- <div style='background-image:url("</?php echo base_url(); ?>uploads/buytolet/</?php echo $value['image_folder'].'/'.$value['featured_image']; ?>")' class="top-section"> -->
									<div class="badge"><?php echo $value['construction_lvl']; ?></div>
						            <div class="badge-bottom"><?php echo $value['type']; ?></div>
								</div>
								<div class="bottom-section">
								
									<div class="sale-status <?php echo strtolower($value['availability']); ?>"><?php echo $value['availability']; ?></div>
									<span class="price-type down-payment">Down payment</span>
									<h3 class="down-payment"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($value['price'] * 0.40); ?></h3>
									<span class="price-type actual-price">Property price</span>
									<h3><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($value['price']); ?></h3>
									<p><?php echo $value['property_name']; ?>. <?php echo $value['propState']; ?></p>
									<ul>
										<li style='list-style:none'>&bullet; <?php echo $value['bed']; ?> bed</li>
										<li>&bullet; <?php echo $value['bath']; ?> bathroom</li>
										<li>&bullet; <?php if(@$value['property_size']){ echo number_format($value['property_size']); } else { echo 0; } ?> sqm</li>
									</ul>

									<div class="key-values">
										<div>
											<span>Lockdown Period</span>
											<h3><?php echo ($value['lockdown_period'])? $value['lockdown_period'] : 0; ?> Months</h3>
										</div>
										<div>
											<span>Down Payment</span>
											<h3><?php echo number_format(($value['minimum_payment_plan']/100) * $value['price']); ?>
											</h3>
										</div>
										<div>
											<span>Installment Period</span>
											<h3><?php echo $value['payment_plan_period']/12; ?> Years</h3>
										</div>
										<div>
											<span>Fixed interest rate</span>
											<h3>9% p.a</h3>
										</div>
									</div>
								</div>
							</a>
						<?php } ?>
					<?php } ?>
    			</div>
			</div>
            <!----Buy to let properties ---->
            
            <!-----Buy to live properties ----->
			<div class="feat-prop-wrapper">
				<div class="prop-option-head">
					<div class="prop-option-top">
						<span class="prop-class">OwnNowPayLater</span>
						<span class="all-prop-btn"><a href="<?php echo base_url('properties/onpl'); ?>">Explore all</a></span>
					</div>
					<div class="prop-option-below">Pay 40% down-payment, spread balance across 3 years at 0% interest.</div>
				</div>
				<div class="home-properties-container">
        					
				<?php if(isset($onpl_properties) && !empty($onpl_properties)){ ?>
						<?php foreach($onpl_properties as $property => $value){ ?>
							<a href="<?php echo base_url()."property/".$value['propertyID']; ?>" class="home-card">

							<div style="background-image: url('<?php echo 'https://'.$bucket.'.s3.amazonaws.com/uploads/buytolet/'.$value['image_folder'].'/'.$value['featured_image']; ?>')" class="top-section">

								<!-- <div style='background-image:url("</?php echo base_url(); ?>uploads/buytolet/</?php echo $value['image_folder'].'/'.$value['featured_image']; ?>")' class="top-section"> -->
									<div class="badge"><?php echo $value['construction_lvl']; ?></div>
						            <div class="badge-bottom"><?php echo $value['type']; ?></div>
								</div>
								<div class="bottom-section">
								
									<div class="sale-status <?php echo strtolower($value['availability']); ?>"><?php echo $value['availability']; ?></div>
									<span class="price-type down-payment">Down payment</span>
									<h3 class="down-payment"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($value['price'] * 0.40); ?></h3>
									<span class="price-type actual-price">Property price</span>
									<h3><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($value['price']); ?></h3>
									<p><?php echo $value['property_name']; ?>. <?php echo $value['propState']; ?></p>
									<ul>
										<li style='list-style:none'>&bullet; <?php echo $value['bed']; ?> bed</li>
										<li>&bullet; <?php echo $value['bath']; ?> bathroom</li>
										<li>&bullet; <?php if(@$value['property_size']){ echo number_format($value['property_size']); } else { echo 0; } ?> sqm</li>
									</ul>
									<div class="key-values">
										<div>
											<span>Down Payment</span>
											<h3>40%</h3>
										</div>
										<div>
											<span>Installment Period</span>
											<h3>3 Years</h3>
										</div>
										<div>
											<span>Interest rate</span>
											<h3>0% p.a</h3>
										</div>
										<div>
											<span>Assured rent</span>
											<h3>4m p.a</h3>
										</div>
									</div>
								</div>
							</a>
						<?php } ?>
					<?php } ?>

				</div>
			</div>
            <!----Buy to live properties ---->
			
		</div>

		<div>
<!-- Nector Script -->
<!-- <script>var nector_params = { customer_id: window.localStorage.getItem("nector-customer-id") }</script>
<script async src="https://cdn.nector.io/nector-static/no-cache/reward-widget/mainloader.min.js"
	data-op="referral"
	data-api_key="ca91f88601fb02c3c90db6bbd20da779dbb3f5d07827db9df99e290617d7d63e"
	data-platform="custom_website"
></script> -->
		</div>

		<div class="stats-wrapper">
			<div class="main-numbers-container">
				<div class="numbers-head">It's your turn; don't miss out!</div>
				<div class="numbers-container">
					<div class="number-item">
						<div class="number">N15m<span>+</span></div>
						<div class="number-reason">Average amount saved on market value of properties</div>
					</div>
					<div class="number-item">
						<div class="number">98<span>+</span></div>
						<div class="number-reason">Properties Funded</div>
					</div>
					<div class="number-item">
						<div class="number">N3.2Bn<span>+</span></div>
						<div class="number-reason">Property value funded</div>
					</div>
					<div class="number-item">
						<div class="number">20,000<span>+</span></div>
						<div class="number-reason">Co-ownership shares</div>
					</div>
				</div>
			</div>
		</div>
        
        <div class="partner-wrapper">
			<h1 class="stats-pool-buy">Supported by leading global investors & partners</h1>
			<div class="partner-logo-container">
			    <div class="partner-logo-item"><img src="<?php echo base_url('assets/img/techstars-logo.png'); ?>" alt="Techstars logo" /></div>
			    <div class="partner-logo-item"><img src="<?php echo base_url('assets/img/lenco-logo.png'); ?>" alt="Lenco logo" /></div>
			    <div class="partner-logo-item"><img src="<?php echo base_url('assets/img/oyester-ventures-logo.png'); ?>" alt="Oyster ventures logo" /></div>
			    <!---<div class="partner-logo-item"><img src="<?php //echo base_url('assets/img/asymmetry-ventures-logo.png'); ?>" alt="Asymmetry ventures logo" /></div>
			    <div class="partner-logo-item"></div>--->
			</div>
        </div>

  	</section>

	  <!-- hopscotch-script -->
	  <script id="hopscotch-script" type="text/javascript">(function (w, d) {if (typeof w === "undefined") return;w.Hopscotch = w.Hopscotch || function () {(w.Hopscotch.q = w.Hopscotch.q || []).push(arguments);};var elm = d.createElement("div");elm.setAttribute("data-widget-host", "hopscotch");elm.setAttribute("data-props-api-key", "4db66c1c-9e8a-431b-b232-06c381199931");d.getElementsByTagName("body")[0].appendChild(elm);var s = d.createElement("script");s.src = "https://app.hopscotch.club/widget.js?";s.async = 1;s.defer = 1;d.getElementsByTagName("body")[0].appendChild(s);  })(window, document);</script>
	<!-- end hopscotch-script -->

  	<!-- main/middle section ends here -->
  	<script src="<?php echo base_url(); ?>asset/js/responsiveslides.js"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
    
    		// Slideshow 1
    		$("#slider1").responsiveSlides({
    			maxwidth: 1500,
    			speed: 800,
    			pager : false
    		});
    
    		// Slideshow 2
    		$("#slider2").responsiveSlides({
    			auto: false,
    			pager: true,
    			speed: 300,
    			maxwidth: 540
    		});
    
    		// Slideshow 3
    		$("#slider3").responsiveSlides({
    			manualControls: '#slider3-pager',
    			maxwidth: 540
    		});
    
    		// Slideshow 4
    		$("#slider4").responsiveSlides({
    			auto: false,
    			pager: false,
    			nav: true,
    			speed: 500,
    			namespace: "callbacks",
    			before: function () {
    				$('.events').append("<li>before event fired.</li>");
    			},
    			after: function () {
    				$('.events').append("<li>after event fired.</li>");
    			}
    		});
        });
  </script>
										
  <script>
      amplitude.getInstance().logEvent('Homepage');
  </script>


