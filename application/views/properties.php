<script>
	function loadCCWidget() {
		(new window["click-connector-widget"]).mount({})
	}

	function loadCCScript() {
		var t = document.createElement("script");
		t.id = "cc-widget-script", t.setAttribute("data-widget-id", "a4e580-bedc4"), t.type = "text/javascript", t.defer = !0, t.addEventListener("load", (function(t) {
			loadCCWidget()
		})), t.src = "https://widget.clickconnector.app/widget.js", document.getElementsByTagName("head")[0].appendChild(t)
	}
	loadCCScript();
</script>

<div class="grid-box">
	<div class="prop-option-head">
		<div class="prop-option-top">
			<span class="prop-class">
				<?php if ($slug == 'co-ownership') { ?>
					Buy2Co-own
				<?php } elseif ($slug == 'bnpl') { ?>
					Buy Now Pay Later
				<?php } elseif ($slug == 'onpl') { ?>
					Own Now Pay Later
				<?php } elseif ($slug == 'buy-2-let') { ?>
					Buy2Let				
				<?php } else { ?>
					Sole Ownership
				<?php } ?>
			</span>
		</div>
		<?php if ($slug == 'co-ownership') { ?>
			<div class="property-hero-container">
				<div class="property-hero-item">
					<div class="note">
						<p>Welcome to Buy2Co-own - the new and innovative way to make property ownership more accessible and affordable for everyone! Have you always dreamed of owning a property but struggled with the high costs? Or maybe you're looking to start a small property portfolio and grow it into something bigger? Look no further, because Buy2Co-own is here to help you achieve your goals.</p>

						<p>Buy2Co-own allows you to buy shares in a property,this not only lowers the barrier to home ownership, but also gives you the opportunity to invest in multiple properties without breaking the bank. With Buy2yCo-own, you can hold onto your property shares until you are ready to migrate into sole ownership or continue growing your portfolio.</p>

						<p>With as little as N4,000, you can start buying property shares at your own pace. As these shares grow in value over time, you can choose to use them as down payment towards a property of your choice. This flexible option allows anyone above the age of 18 to become a co-owner in no time.</p>

					</div>
				</div>
				<div class="property-hero-item">
					<img src="<?php echo base_url(); ?>asset/images/co-own-image.jpg" alt="Co-ownership image" />
				</div>
			</div>
			<!--<div class="prop-option-below">Start your home ownership journey today with as little as <span style="font-family:helvetica;">&#x20A6;</span>4,000</div>--->

		<?php } elseif ($slug == 'bnpl' || $slug == 'onpl' || $slug == 'buy-2-let') { ?>
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
					<?php } elseif ($slug == 'buy-2-let'){ ?>
						<div class="note">
							<p>
							We launched BuySmallSmall with our Buy2Let package in 2021, and we sold the first 34 listed units within a month. For 3 years we've been consumed by the passion to offer a plan that could further lower the barrier and allow as many aspiring homeowners to become actual homeowners.
							</p>
							<p>
							There is a need to create a cheaper and safer alternative that is scalable. Hence we've stepped in with Buy2Let. Just imagine not having to pay all these traditional mortgage fees when you do Buy2Let
							</p>
							<ul>
								<li>No "Origination" fee</li>
								<li>No "Title Search" fee</li>
								<li>No "Valuation" fee</li>
								<li>No "Verification of Title" fee</li>
								<li>No "Charting" fee</li>
								<li>No "Mortgage protection insurance" fee</li>
								<li>No "Credit Bureau" fee</li>
								<li>No "interest rate"</li>
								<li>No "monthly repayment obligation"</li>
							</ul>
							<p>Our Buy2Let package reduces the chances of you losing your home to zero. When you buy any of our listed units, you get:  </p>
							<ul>
								<li>Instant allocation</li>
								<li>Instant deed issuance in your name (Kept in escrow)</li>
							</ul>
						</div>
					<?php } ?>
				</div>
				<div class="property-hero-item">
					<?php if ($slug == 'bnpl') { ?>
						<img src="<?php echo base_url(); ?>asset/images/onpl-hero-img.svg" alt="buy now pay later image" />
					<?php } elseif ($slug == 'onpl') { ?>
						<img src="<?php echo base_url(); ?>asset/images/bnpl-image.jpg" alt="Own now pay later image" />
					<?php } elseif ($slug == 'buy-2-let') { ?>
						<img src="<?php echo base_url(); ?>asset/images/buy-2-let-image.svg" alt="Buy 2 Let image" />
					<?php } ?>
				</div>
			</div>

		<?php } else { ?>
			<div class="prop-option-below">Get a 5 years payback period and enjoy 10 years guaranteed rent.</div>
		<?php } ?>

		<!-- Filter Section -->
		<div class="form-properties">
			<form method="POST" action="<?php echo base_url() . "properties-filter"; ?>">
				<?php //$slugValue = $slug != 'co-ownership' ? 2 : 5 ?>

				<?php
					$slugValues = [
						'buy-2-let' => 2,
					    'bnpl' => 6,
					    'onpl' => 7,
					    'co-ownership' => 5
					];

					$slugValue = $slugValues[$slug] ?? 2;
				?>

				<input type="hidden" name="slug" value="<?php echo $slugValue; ?>">
				<select name="list_price" class="properties-select" id="list_price_select">
					<option value=""> List Price</option>
					<option value="50000000">Under N50,000,000</option>
					<option value="100000000">N50,000,000 - N100,000,000</option>
					<option value="150000000">N100,000,000 - N150,000,000</option>
					<option value="200000000">N150,000,000 - N200,000,000</option>
					<option value="250000000">N200,000,000 - N250,000,000</option>
					<option value="300000000">N250,000,000 - N300,000,000</option>
					<option value="350000000">N300,000,000 - N350,000,000</option>
					<option value="400000000">N350,000,000 - N400,000,000</option>
					<option value="450000000">N400,000,000 - N450,000,000</option>
					<option value="500000000">N450,000,000 - N500,000,000</option>
					<option value="550000000">N500,000,000 - N550,000,000</option>
					<option value="550000000">N550,000,000 + </option>
				</select>
				<select name="state" class="properties-select" id="state_select">
					<option value="0">State</option>
					<?php if (isset($states) && !empty($states)) { ?>
						<?php foreach ($states as $state => $value) { ?>
							<option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
						<?php } ?>
					<?php } ?>
				</select>
				<select name="location" class="properties-select" id="location_select">
					<option value="0">Location</option>
					<?php //if (isset($locations) && !empty($locations)) { 
					?>
					<?php //foreach ($locations as $location => $value) { 
					?>
					<!---<option value="<?php //echo $value['name'] 
										?>"><?php //echo $value['name'] 
											?></option>--->
					<?php //} 
					?>
					<?php //} 
					?>
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
				<input type="hidden" id="state" name="state" />
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
						<span class="price-type down-payment">
							<?php
								if($slug == 'bnpl'){
									echo "Lockdown Fee";
								} elseif($slug == 'buy-2-let'){
									echo "Start with";
								}else{
									echo "Down Payment";
								}
							//echo ($slug == 'bnpl') ? 'Lockdown Fee' : 'Down payment'; 
							?>
						</span>
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
									<h3>N<?php echo number_format(($each_prop['minimum_payment_plan'] / 100) * $each_prop['price']); ?>
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
									<h3><?php echo $each_prop['minimum_payment_plan']; ?>%</h3>
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
									<h3><?php echo ($each_prop['rent_per_annum'])? : 0; ?>M p.a</h3>
								</div>
							</div>
						<?php } elseif ($slug == 'buy-2-let') { ?>
							<div class="key-values">
								<div>
									<span>Min Alt-Mortgage period</span>
									<h3><?php echo $each_prop['min_mortgage'].'yrs'; ?></h3>
								</div>
								<div>
									<span>Max Alt-Mortgage period</span>
									<h3><?php echo $each_prop['max_mortgage'].'yrs'; ?></h3>
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

<script src="<?php echo base_url('asset\js\properties-page.js'); ?>"></script>