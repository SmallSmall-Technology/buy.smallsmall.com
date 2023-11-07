<div class="grid-box">
	<div class="prop-option-head">
		<div class="prop-option-top">
			<span class="prop-class">
				<?php if ($slug == 'co-ownership') { ?>
					Co Ownership
				<?php } elseif ($slug == 'bnpl') { ?>
					Buy Now Pay Later
				<?php } elseif ($slug == 'onpl') { ?>
					Own Now Pay Later
				<?php } else { ?>
					Sole Ownership
				<?php } ?>
			</span>
		</div>
		<?php if ($slug == 'co-ownership') { ?>
			<div class="prop-option-below">Start your home ownership journey today with as little as <span style="font-family:helvetica;">&#x20A6;</span>4,000</div>

		<?php } elseif ($slug == 'bnpl' || $slug == 'onpl') { ?>
			<div class="property-hero-container">
				<div class="property-hero-item">
					<?php if ($slug == 'bnpl') { ?>
						<div class="note">
							<p>Powering a new generation of homeowners and landlords.</p>
							<p>Introducing Buy Now Pay Later, the groundbreaking homeownership product designed to empower the new generation of homeowners in building their real estate portfolio effortlessly.</p>
							<p>Gone are the days of waiting and saving for years to secure your interest in a property. Buy Now Pay Later empowers you to lock down the price of your desired property today, giving you the peace of mind that it won't slip away and you won't pay a skyrocketed price.</p>
							<p>Imagine the freedom of owning your second home without the upfront costs, knowing that its price is locked down, while having the freedom to prepare yourself financially before making your first payment.</p>
							<p>Our innovative solution allows you to seize the perfect opportunity in the real estate market without the immediate financial burden. Say goodbye to the traditional constraints of homeownership for good!</p>
							<p>It's time to make your move and embark on a path towards lifelong success as a homeowner or landlord.</p>
						</div>
					<?php } elseif ($slug == 'onpl') { ?>
						<div class="note">
							<p>Welcome to Own now pay later, the revolutionary home ownership product designed for the new generation of homeowners. With this innovative package, you can finally achieve your dream of owning a property without having to worry about high interest rates and financial constraints. Our mission is simple - to empower individuals in building their real estate portfolio effortlessly.</p>

							<p>Own now pay later allows you to lock down the price of your desired property today with just a 40% down payment. Say goodbye to worrying about fluctuating prices and bidding wars in the real estate market. By securing your property at its current value, you can have peace of mind knowing that it will be yours when you are ready.</p>

							<p>But what truly sets us apart from other home ownership programs is our interest-free installment plan. We understand that buying a house is a huge investment and we don't want it to become an overwhelming burden on your finances. That's why we offer flexible payment options over a period of 3 years, giving you enough time and breathing space while still being able to call yourself a homeowner.</p>
						</div>
					<?php } ?>
				</div>
				<div class="property-hero-item">
					<?php if ($slug == 'bnpl') { ?>
						<img src="<?php echo base_url(); ?>asset/images/onpl-hero-img.svg" alt="buy now pay later image" />
					<?php } elseif ($slug == 'onpl') { ?>
						<img src="<?php echo base_url(); ?>asset/images/bnpl-image.jpg" alt="Own now pay later image" />
					<?php } ?>
				</div>
			</div>

		<?php } else { ?>
			<div class="prop-option-below">Get a 5 years payback period and enjoy 10 years guaranteed rent.</div>
		<?php } ?>

		<!-- Filter Section -->
		<div class="form-properties">
			<form method="POST" action="<?php echo base_url() . "properties-filter"; ?>">
				<?php $slugValue = $slug != 'co-ownership' ? 2 : 5 ?>

				<input type="hidden" name="slug" value="<?php echo $slugValue; ?>">
				<select name="list_price" class="properties-select" id="list_price_select">
					<option value=""> List Price</option>
					<option value="500000">Under N500,000</option>
					<option value="1000000">N500,000 - N1,000,000</option>
					<option value="2500000">N1,100,000 - N2,500,000</option>
					<option value="5000000">N2,600,000 - N5,000,000</option>
					<option value="7500000">N5,100,000 - N7,500,000</option>
					<option value="10000000">N7,600,000 - N10,000,000</option>
					<option value="15000000">N10,100,000 - N15,000,000</option>
					<option value="20000000">N15,100,000 - N20,000,000</option>
					<option value="30000000">N21,000,000 - N30,000,000</option>
					<option value="40000000">N31,000,000 - N40,000,000</option>
					<option value="50000000">N41,000,000 - N50,000,000</option>
					<option value="51000000">N51,000,000 + </option>
				</select>
				<select name="location" class="properties-select" id="location_select">
					<option value="0">Location</option>
					<?php if (isset($locations) && !empty($locations)) { ?>
						<?php foreach ($locations as $location => $value) { ?>
							<option value="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
						<?php } ?>
					<?php } ?>
				</select>
				<select name="property_type" class="properties-select" id="property_type_select">
					<option value="0">Property Type</option>
					<?php if (isset($apts) && !empty($apts)) { ?>
						<?php foreach ($apts as $apt => $value) { ?>
							<option value="<?php echo $value['type'] ?>"><?php echo $value['type'] ?></option>
						<?php } ?>
					<?php } ?>
				</select>
				<!-- Input fields for list_price, location, and property_type -->
				<input type="hidden" id="list_price" name="list_price" />
				<input type="hidden" id="location" name="location" />
				<input type="hidden" id="property_type" name="property_type" />
				<input type="submit" class="properties-button" value="Filter"></input>
			</form>
		</div>
		<!-- End Filter Section -->
	</div>
	<?php //echo $slug; 
	?>

	<?php if (isset($properties) && !empty($properties)) { ?>

		<?Php
		$bucket = 'bss-prod-uploads'; // Bucket name
		// Include AWS SDK and create S3 client
		require 'vendor/autoload.php';
		$s3 = new Aws\S3\S3Client([
			'version' => 'latest',
			'region' => 'eu-west-1'
		]);

		?>

		<?php if ($slug != 'co-ownership') { ?>

			<?php foreach ($properties as $property => $each_prop) { ?>

				<a href="<?php echo base_url() . "property/" . $each_prop['propertyID']; ?>" class="card">
					<div style="background-image: url('<?php echo 'https://' . $bucket . '.s3.amazonaws.com/uploads/buytolet/' . $each_prop['image_folder'] . '/' . $each_prop['featured_image']; ?>')" class="top-section">
						<!-- <div style='background-image:url("</?php echo base_url(); ?>uploads/buytolet/</?php echo $each_prop['image_folder'] . '/' . $each_prop['featured_image']; ?>")' class="top-section"> -->
						<div class="badge"><?php echo $each_prop['construction_lvl']; ?></div>
						<div class="badge-bottom"><?php echo $each_prop['type']; ?></div>
					</div>
					<div class="bottom-section">
						<div class="sale-status <?php echo strtolower($each_prop['availability']); ?>"><?php echo $each_prop['availability']; ?></div>
						<span class="price-type down-payment"><?php echo ($slug == 'bnpl') ? 'Lockdown Fee' : 'Down payment'; ?></span>
						<h3 class="down-payment"><span style="font-family:helvetica;">&#x20A6;</span><?php echo ($slug == 'bnpl') ? number_format($each_prop['price'] * ($each_prop['lockdown_fee'] / 100)) : number_format($each_prop['price'] * ($each_prop['minimum_payment_plan'] / 100)); ?></h3>
						<span class="price-type actual-price">Property price</span>
						<h3><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($each_prop['price']); ?></h3>
						<p><?php echo $each_prop['property_name']; ?>, <?php echo $each_prop['city'] . ' ' . $each_prop['propState'] . '.'; ?></p>
						<ul>
							<li style='list-style:none'>&bullet; <?php echo $each_prop['bed']; ?> bed</li>
							<li>&bullet; <?php echo $each_prop['bath']; ?> bathroom</li>
							<li>&bullet; <?php if (@$each_prop['property_size']) {
												echo number_format($each_prop['property_size']);
											} else {
												echo 0;
											} ?> sqm</li>
						</ul>
						<?php if ($slug == 'bnpl') { ?>
							<div class="key-values">
								<div>
									<span>Lockdown Period</span>
									<h3><?php echo ($each_prop['lockdown_period']) ? $each_prop['lockdown_period'] : 0; ?> Months</h3>
								</div>
								<div>
									<span>Down Payment</span>
									<h3><?php echo number_format(($each_prop['minimum_payment_plan'] / 100) * $each_prop['price']); ?>
									</h3>
								</div>
								<div>
									<span>Installment Period</span>
									<h3><?php echo $each_prop['payment_plan_period'] / 12; ?> Years</h3>
								</div>
								<div>
									<span>Fixed interest rate</span>
									<h3>9% p.a</h3>
								</div>
							</div>
						<?php } elseif ($slug == 'onpl') { ?>
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
						<?php } else { ?>
							<div class="key-values">
								<div>
									<span>Rent P.A <div class="tooltip"><i class="fa fa-info"></i><span class="propstooltiptext">Rent per annum.</span></div></span>
									<h3><span style="font-family:helvetica;">&#x20A6;</span><?php echo @$each_prop['expected_rent'] / 1000000; ?>M</h3>
								</div>
								<div>
									<span>Ann. return <div class="tooltip"><i class="fa fa-info"></i><span class="propstooltiptext">Annualized return.</span></div></span>
									<h3><?php echo number_format((pow((($asset_1 + $each_prop['expected_rent']) / $each_prop['marketValue']), 1) - 1) * 100); ?>%
									</h3>
								</div>
								<div>
									<span>Appreciation</span>
									<h3><?php $asset_1 = ((($each_prop['asset_appreciation_1'] / 100) * $each_prop['marketValue']) + $each_prop['marketValue']);
										echo $each_prop['asset_appreciation_1']; ?>%
								</div>
							</div>
						<?php } ?>
					</div>
				</a>

			<?php } ?>

		<?php } else { ?>

			<?php foreach ($properties as $property => $each_prop) { ?>

				<a href="<?php echo base_url() . "co-own/" . $each_prop['propertyID']; ?>" class="card">
					<div style="background-image: url('<?php echo 'https://' . $bucket . '.s3.amazonaws.com/uploads/buytolet/' . $each_prop['image_folder'] . '/' . $each_prop['featured_image']; ?>')" class="top-section">
						<!-- <div style='background-image:url("</?php echo base_url(); ?>uploads/buytolet/</?php echo $each_prop['image_folder'] . '/' . $each_prop['featured_image']; ?>")' class="top-section"> -->
						<?php if (@$each_prop['construction_lvl']) { ?>
							<div class="badge"><?php echo $each_prop['construction_lvl']; ?></div>
						<?php } ?>
						<div class="badge-bottom"><?php echo $each_prop['type']; ?></div>
					</div>
					<div class="bottom-section">
						<div class="sale-status <?php echo strtolower($each_prop['availability']); ?>"><?php echo ($each_prop['availability'] == 'Available') ? 'Buy now' : 'Sold out'; ?></div>

						<span class="price-type down-payment">Starting price</span>
						<h3 class="down-payment"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($each_prop['price']); ?><span style="display:inline-block;font-size:16px;line-height:27px"> / Share</span></h3>
						<p><?php echo $each_prop['property_name']; ?>. <?php echo $each_prop['propState']; ?></p>
						<ul class="pool-price-box">
							<li class="pool-price-box-item">
								<span class="price-type actual-price">Shares listed</span>
								<h3><?php echo number_format($each_prop['pool_units']); ?></h3>
							</li>
							<li class="pool-price-box-item">
								<span class="price-type actual-price">Shares remaining</span>
								<h3><?php echo number_format($each_prop['available_units']); ?></h3>
							</li>
						</ul>
						<ul class="pool-price-box">
							<li class="pool-price-box-item">
								<span class="price-type actual-price">Property price</span>
								<h3><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($each_prop['marketValue']); ?></h3>
							</li>
							<li class="pool-price-box-item">&nbsp;</li>
						</ul>

						<ul>
							<li style='list-style:none'>&bullet; <?php echo $each_prop['bed']; ?> bed</li>
							<li>&bullet; <?php echo $each_prop['bath']; ?> bathroom</li>
							<li>&bullet; <?php if (@$each_prop['property_size']) {
												echo number_format($each_prop['property_size']);
											} else {
												echo 0;
											} ?> sqm</li>
						</ul>
						<div class="key-values">
							<div>
								<span>Hold period</span>
								<h3>
									<?php
									$returns = $each_prop['co_appr_1'] + $each_prop['co_appr_2'] + $each_prop['co_appr_3'] + $each_prop['co_appr_4'] + $each_prop['co_appr_5'] + $each_prop['co_appr_6'] + $each_prop['co_rent_1'] + $each_prop['co_rent_2'] + $each_prop['co_rent_3'] + $each_prop['co_rent_4'] + $each_prop['co_rent_5'] + $each_prop['co_rent_6'];
									if (@$each_prop['hold_period'] == 'One year') {
										echo "1 year";
									} elseif (@$each_prop['hold_period'] == 'Two years') {
										echo "2 years";
									} elseif (@$each_prop['hold_period'] == 'Three years') {
										echo "3 years";
									} elseif (@$each_prop['hold_period'] == 'Four years') {
										echo "4 years";
									} elseif (@$each_prop['hold_period'] == 'Five years') {
										echo "5 years";
									} elseif (@$each_prop['hold_period'] == 'Six years') {
										echo "6 years";
									} else {
										echo @$each_prop['hold_period'];
									}
									?>
								</h3>
							</div>
							<div>
								<span>Buyback rate <div class="tooltip"><i class="fa fa-info"></i><span class="propstooltiptext">Buyback rate for the entire hold period.</span></div></span>
								<h3><?php echo $returns; ?>%</h3>
							</div>
						</div>
					</div>
				</a>


			<?php } ?>

		<?php } ?>


		<div class="pagination">
			<?php echo $page_links; ?>
		</div>


	<?php } else { ?>

		<div class="prop-option-below mb:20px"><span></span>No results matching your search.</span></div>

	<?php } ?>
</div>
<script>
	function fbShare(url, title, descr, image, winWidth, winHeight) {
		var winTop = (screen.height / 2) - (winHeight / 2);
		var winLeft = (screen.width / 2) - (winWidth / 2);
		window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
	}
	$('.js-share-twitter-link').click(function(e) {
		e.preventDefault();
		var href = $(this).attr('href');
		window.open(href, "Twitter", "height=285,width=550,resizable=1");
	});
</script>
<script>
	// Add event listeners to the select elements
	document.getElementById('list_price_select').addEventListener('change', updateHiddenListPrice);
	document.getElementById('location_select').addEventListener('change', updateHiddenLocation);
	document.getElementById('property_type_select').addEventListener('change', updateHiddenPropertyType);

	// Function to update the hidden list_price input field
	function updateHiddenListPrice() {
		var listPrice = document.getElementById('list_price_select').value;
		document.getElementById('list_price').value = listPrice;
	}

	function updateHiddenLocation() {
		var location = document.getElementById('location_select').value;
		document.getElementById('location').value = location;
	}

	function updateHiddenPropertyType() {
		var propertyType = document.getElementById('property_type_select').value;
		document.getElementById('property_type').value = propertyType;
	}
</script>