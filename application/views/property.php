<div class="property-page-wrapper">
    <div class="property-left-section">

        <div class="property-slide-image">
            <!----Start of Slider ---->
            <div id="slider">
                <ul class="rslides" id="slider1">

                    <!-- Slider Image from AWS S3 Bucket -->

                    <?php

                    // Include AWS SDK and create S3 client
                    require 'vendor/autoload.php';

                    $s3 = new Aws\S3\S3Client([

                        'version' => 'latest',

                        'region' => 'eu-west-1'
                    ]);

                    try {

                        // S3 bucket name
                        $bucket = 'bss-prod-uploads';

                        // List the objects in the specified S3 bucket under a specific prefix
                        $objects = $s3->listObjectsV2([

                            'Bucket' => $bucket,

                            'Prefix' => 'uploads/buytolet/' . $property['image_folder'] . '/',

                        ]);

                        // Count the number of objects in the S3 bucket
                        $content_size = count($objects['Contents']);

                        // Initialize a counter for tracking processed objects
                        $count = 0;

                        // Iterate through the objects in s3
                        foreach ($objects['Contents'] as $object) {

                            // Get the file extension of the object
                            $file_type = strtolower(pathinfo($object['Key'], PATHINFO_EXTENSION));

                            // Check if the file extension is not empty and the count is within bounds
                            if ($file_type !== '' && $count <= ($content_size - 2)) {

                                // Generate a URL for the our S3 object
                                $url = $s3->getObjectUrl($bucket, $object['Key']);

                    ?>

                                <li>
                                    <img src="<?php echo $url; ?>" alt="buy small small property">
                                </li>

                    <?php

                            }

                            // Increment the count
                            $count++;
                        }
                    } catch (Aws\S3\Exception\S3Exception $e) {

                        // Handle any AWS S3 exceptions that may occur
                        echo 'An error occurred: ' . $e->getMessage();
                    }

                    ?>

                    <!-- End Slider Image AWS S3 Bucket -->

                </ul>
            </div>
            <!----End of Slider ---->
        </div>

        <div class="property-left-word-sect">
            <h1><?php echo $property['property_name']; ?></h1>

            <div class="price-discount-sect">
                <?php if ($property['investment_type'] == 6) { ?>
                    <div class="price-box">
                        <p>Lockdown Fee</p>
                        <h2 style="font-weight:bold">
                            <span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format(0.05 * $property['price']); ?>
                            <div class="tooltip"><i class="fa fa-info"></i>
                                <span class="tooltiptext">
                                    LDF is a non-refundable fee. It subsitutes as transaction fee<br />
                                    when you make a down-payment on or beore 9 months.
                                </span>
                            </div>
                        </h2>
                    </div>
                <?php } ?>
                <?php if($property['investment_type'] != 2){ ?>
                <div class="price-box">
                    <p>Payment tenure</p>
                    <h2 style="font-weight:bold"><?php echo ($property['payment_plan_period'] / 12); ?> Years</h2>
                </div>
                <?php } ?>
                <div class="price-box">
                    <p><?php echo ($property['investment_type'] == 2)? 'Minimum Deposit' : 'Minimum down payment'; ?></p>
                    <h2 style="font-weight:bold"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format(($property['minimum_payment_plan'] / 100) * $property['price']); ?>
                        <div class="tooltip"><i class="fa fa-info"></i>
                            <span class="tooltiptext">
                                <?php if($property['investment_type'] == 2){ ?>
                                        Minimum deposit is required to own this property.
                                <?php } else { ?>}
                                        Initial down-payment due based on listing duration from day property is locked.
                                <?php } ?>
                            </span>
                        </div>
                    </h2>
                </div>
            </div>
            <div class="price-discount-sect">
                <div class="price-box">
                    <p>List price</p>
                    <h2 class="list-price"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($property['price']); ?></h2>
                </div>
            </div>
            <div class="full-disp">
                <div class="half-disp">
                    <h3 style="font-family:'Cera Medium'"><?php echo $property['bed']; ?> bedroom apartment</h3>
                    <div class="location-sect">
                        <i class="fa fa-map-marker"></i>
                        <p><?php echo $property['city']; ?>, <?php echo $property['propState']; ?></p>
                    </div>
                </div>
                <div class="half-disp">
                    <h3 style="font-family:'Cera Medium'">Property status</h3>
                    <div class="full-disp">
                        <div class="half-disp">
                            <span class="date-top">Start date</span>
                            <span class="date-bottom">
                                <?php 
                                    if (@$property['start_date']) {
                                        echo date('d M, Y', strtotime($property['start_date']));
                                    } else {
                                        echo '';
                                    } 
                                ?>
                            </span>
                        </div>
                        <div class="half-disp">
                            <span class="date-top">Finish date</span>
                            <span class="date-bottom">
                                <?php 
                                    if (@$property['finish_date']) {
                                        echo date('d M, Y', strtotime($property['finish_date']));
                                    } else {
                                        echo '';
                                    } 
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="property-props">
                <p><?php echo $property['bed']; ?> bed</p>
                <p><?php echo $property['bath']; ?> bathroom</p>
                <p>
                    <?php 
                        if (@$property['property_size']) {
                            echo number_format($property['property_size']);
                        } else {
                            echo 0;
                        } 
                    ?> sqm
                </p>
            </div>
        </div>
        <?php if($property['investment_type'] == 2){ ?>
        <div class="migration-txt">
            Things to note about Buy2Let:
            <ul class="migration-list">
                <li>i. Make only 20% to 50% deposit to own this unit.</li>
                <li>ii. The title is issued in your name upon deposit payment.</li>
                <li>iii. Your deposit % determines the Alt-Mortgage Period (AMP).</li>
                <li>iv. The balance is covered from generated rent over the AMP.</li>
                <li>v. Take full possession of the property and title at the end of AMP.</li>
            </ul>
            <a class="migration-lnk" href="#" target="_blank">Learn more about Buy2Let here <i class="fa fa-angle-double-right"></i></a>
        </div>
        <?php } ?>
        <?php if($property['investment_type'] != 2){ ?>
        <div class="features_description">
            <!---<p>Financial highlights</p>--->
            <p>Projected rent</p>
            <div class="highlight-tbl-container">
                <table cellpadding="5" class="highlight-tbl">
                    <tr>
                        <th></th>
                        <th>Year 0</th>
                        <th>Year 1</th>
                        <th>Year 5</th>
                        <th>Year 10</th>
                    </tr>
                    <tr>
                        <th>Rent</th>
                        <td>0</td>
                        <td><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format(@$property['expected_rent'] / 1000000) . "M"; ?></td>
                        <td><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format((@$property['expected_rent'] + ((@$property['expected_rent'] * 0.18) * 5)) / 1000000) . "M"; ?></td>
                        <td><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format((@$property['expected_rent'] + ((@$property['expected_rent'] * 0.18) * 10)) / 1000000) . "M"; ?></td>
                    </tr>
                    
                </table>
            </div>

        </div>
        <?php } ?>
        <div class="features_description">
            <?php if ($property['investment_type'] != 6) { ?>
                <div class="payment-box">
                    <h2><?php echo ($property['investment_type'] == 2)? 'Own' : 'Buy'; ?> now</h2>
                    <h1><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($property['price']); ?></h1>


                    <div class="financing-options-sect">
                        <div class="option-list1">
                            <div class="finance-left-options">
                                <div class="finance">
                                    Select Plan
                                    <div class="tooltip"><i class="fa fa-info"></i>
                                        <span class="tooltiptext">
                                            Champ plan only for children age 1 to 12 years.
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="finance-right-options">
                                <select id="payment-option" class="minimal payment-option">
                                    <?php if ($property['investment_type'] == 2) { ?>
                                        <option value="standard-btl">Standard</option>
                                        <option value="champ">Champ</option>
                                    <?php }else{ ?>
                                        <option value="finance">Payment Plan</option>
                                        <option value="outright">Outright Payment</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>


            <!--- Finance payment option ---->

            <div class="payment-box payment-boxes mortgage-finance-payment">
                <?php if ($property['investment_type'] != 6 && $property['investment_type'] != 2) { ?>
                    <h2>Payment Plan</h2>
                    <h4>Down Payment</h4>
                    <!---<p>What do you have?</p>--->
                    <h1 class="price" id="demo"><span style="font-family:helvetica;">&#x20A6;</span><?php //echo number_format($property['price']); ?></h1>
                    <!---- Range selector ---->
                    <div class="range-container">
                        <div class="pc percentage-container"><?php echo $property['minimum_payment_plan']; ?>%</div>
                        <input type="range" min="<?php echo ((@$property['minimum_payment_plan'] / 100) * $property['price']); ?>" max="<?php echo $property['price']; ?>" step="<?php echo (0.05 * $property['price']); ?>" value="<?php echo ((@$property['minimum_payment_plan'] / 100) * $property['price']); ?>" class="sliders" id="myRange">

                    </div>
                    <!---- Range selector ---->

                    <?php if ($property['investment_type'] != 7) { ?>
                        <!---- Payback period for buy to let only ---->
                        <div class="single-span-col-input year-selector-container">
                            <select id="repayment-period" class="minimal year-selector">
                                <option value="">Payback period</option>
                                <?php if ($property['payment_plan_period'] >= 12) { ?>
                                    <option value="1">1 Year</option>
                                <?php } ?>
                                <?php if ($property['payment_plan_period'] > 12) { ?>
                                    <option value="2">2 Years</option>
                                <?php } ?>
                                <?php if ($property['payment_plan_period'] > 24) { ?>
                                    <option value="3">3 Years</option>
                                <?php } ?>
                                <?php if ($property['payment_plan_period'] > 36) { ?>
                                    <option value="4">4 Years</option>
                                <?php } ?>
                                <?php if ($property['payment_plan_period'] > 48) { ?>
                                    <option value="5">5 Years</option>
                                <?php } ?>
                                <?php if ($property['payment_plan_period'] > 60) { ?>
                                    <option value="6">6 Years</option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } ?>
                    <div class="financing-options-sect">
                        <div class="option-list1">
                            <div class="finance-left-options">
                                <div class="finance">Down payment</div>
                            </div>
                            <div class="finance-right-options">
                                <div>
                                    <div id="down-payment" class="price finance-numbers"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($property['price']); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="option-list3">
                            <div class="finance-left-options">
                                <div class="finance">Transaction fee</div>
                                <div class="finance-desc">5% of property price</div>
                            </div>
                            <div class="finance-right-options">
                                <div>
                                    <div class="finance-numbers"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($property['price'] * 0.05); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="option-list3">
                            <div class="finance-left-options">
                                <div class="finance">Payment duration</div>
                            </div>
                            <div class="finance-right-options">
                                <div>
                                    <div class="finance-numbers" id="repayment-period-display">1 Year</div>
                                </div>
                            </div>
                        </div>
                        <div class="option-list3">
                            <div class="finance-left-options">
                                <div class="finance">Total initial payment</div>
                            </div>
                            <div class="finance-right-options">
                                <div>
                                    <div class="total_desc finance-numbers" id="total-output"><span style="font-family:helvetica;">&#x20A6;</span>0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }elseif ($property['investment_type'] == 2) { ?>

                    <h2>Deposit</h2>
                    <h4>Amount</h4>
                    <h1 class="price" id="standard-demo"><span style="font-family:helvetica;">&#x20A6;</span><?php //echo number_format($property['price']); ?></h1>
                    <!---- Range selector ---->
                    <div class="range-container">
                        <div class="std-percentage-container pc">20%</div>
                        <input type="range" min="<?php echo (0.20 * $property['price']); ?>" max="<?php echo  (0.50 * $property['price']); ?>" step="<?php echo (0.10 * $property['price']); ?>" value="<?php echo (0.20 * $property['price']); ?>" class="sliders" id="myStandardRange">

                    </div>
                    <!---- Range selector ---->
                    
                    <div class="financing-options-sect">
                        <div class="option-list1">
                            <div class="finance-left-options">
                                <div class="finance">Deposit</div>
                            </div>
                            <div class="finance-right-options">
                                <div>
                                    <div id="standard-down-payment" class="price finance-numbers"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($property['price']); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="option-list1">
                            <div class="finance-left-options">
                                <div class="finance">Alt Mortgage Period</div>
                            </div>
                            <div class="finance-right-options">
                                <div>
                                    <div id="std-alt-mortgage-period" class="price finance-numbers">18 Years</div>
                                </div>
                            </div>
                        </div>
                        <div class="option-list3">
                            <div class="finance-left-options">
                                <div class="finance">Transaction fee</div>
                                <div class="finance-desc">5% of property price</div>
                            </div>
                            <div class="finance-right-options">
                                <div>
                                    <div class="finance-numbers"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($property['price'] * 0.05); ?></div>
                                </div>
                            </div>
                        </div>                        
                    </div>

                <?php } else { ?>
                    <h2>Start now</h2>
                    <div class="option-list3">
                        <div class="finance-left-options">
                            <div class="finance">Transaction fee</div>
                            <div class="finance-desc"><?php echo $each_prop['lockdown_fee']; ?>% of property price</div>
                        </div>
                        <div class="finance-right-options">
                            <div>
                                <div class="finance-numbers"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($property['price'] * ($property['lockdown_fee'] / 100)); ?></div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="repayment-period" value="6" />
                <?php } ?>
                <?php if ($property['availability'] != 'Sold' && $property['availability'] != 'Locked') { ?>
                    <div style="width:100%;text-align:center;">
                        <div class="payment-btn option-but"><?php echo ($property['investment_type'] == 7 || $property['investment_type'] == 2) ? 'Own Now' : 'Apply Now'; ?></div>
                    </div>
                <?php } ?>
            </div>
            <!--- Finance payment option ---->


            <!--- Champ payment option ---->
            <div class="payment-box payment-boxes champ-payment">
                <h2>Deposit</h2>
                <h4>Amount</h4>
                <h1 class="price" id="champ-demo"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($property['price']); ?></h1>
                <!---- Range selector ---->
                <div class="range-container">
                    <div class="champ-percentage-container pc">20%</div>
                    <input type="range" min="<?php echo (0.20 * $property['price']); ?>" max="<?php echo (0.50 * $property['price']); ?>" step="<?php echo (0.10 * $property['price']); ?>" value="<?php echo (0.20 * $property['price']); ?>" class="sliders" id="myChampRange">

                </div>
                <!---- Range selector ---->
                
                <div class="financing-options-sect">
                    <div class="option-list1">
                        <div class="finance-left-options">
                            <div class="finance">Deposit</div>
                        </div>
                        <div class="finance-right-options">
                            <div>
                                <div id="champ-down-payment" class="price finance-numbers"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($property['price']); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="option-list1">
                        <div class="finance-left-options">
                            <div class="finance">Alt Mortgage Period</div>
                        </div>
                        <div class="finance-right-options">
                            <div>
                                <div id="champ-alt-mortgage-period" class="price finance-numbers">18 Years</div>
                            </div>
                        </div>
                    </div>
                    <div class="option-list3">
                        <div class="finance-left-options">
                            <div class="finance">Transaction fee</div>
                            <div class="finance-desc">2.5% of property price</div>
                        </div>
                        <div class="finance-right-options">
                            <div>
                                <div class="finance-numbers"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($property['price'] * 0.025); ?></div>
                            </div>
                        </div>
                    </div>                        
                </div> 
                <?php if ($property['availability'] != 'Sold' && $property['availability'] != 'Locked') { ?>
                    <div style="width:100%;text-align:center;">
                        <div class="payment-btn option-but">Own Now</div>
                    </div>
                <?php } ?>               
            </div>
            <!--- Champ payment option ---->


            <!--- Outright payment option ---->
            <div class="payment-box payment-boxes outright-payment">
                <?php $outright_price = $property['price'] - $property['outrightDiscount']; ?>
                <?php $saved_price = $property['outrightDiscount'] + ($outright_price * 0.05); ?>

                <h2>Outright Purchase</h2>
                <!--<h4>Down Payment</h4>
                    <p>What do you have?</p>
                    <h1>N35,000,000</h1>--->
                <!---- Range selector ---->
                <div class="financing-options-sect">
                    <div class="option-list3">
                        <div class="finance-left-options">
                            <div class="finance">Subtotal</div>
                        </div>
                        <div class="finance-right-options">
                            <div>
                                <div class="finance-numbers"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format(@$property['price']); //echo number_format($property['price'] + ($property['price'] * 0.05)); 
                                                                                                                    ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="option-list3">
                        <div class="finance-left-options">
                            <div class="finance">Transaction fee</div>
                            <div class="finance-desc">5% of property price</div>
                        </div>
                        <div class="finance-right-options">
                            <div>
                                <div class="finance-numbers" style="text-decoration:line-through;text-decoration-color:#F00;text-decoration-thickness:3px;"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($outright_price * 0.05); ?></div>
                                <div style="text-align:right" class="finance-desc">Waived for outright buyers</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="option-list3">
                        <div class="finance-left-options">
                            <div class="finance">Amount saved</div>
                            <!---<div class="finance-desc">5% of property price</div>--->
                        </div>
                        <div class="finance-right-options">
                            <div>
                                <div class="finance-numbers"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($saved_price); ?></div>

                            </div>
                        </div>
                    </div>
                    <div class="option-list3">
                        <div class="finance-left-options">
                            <div class="finance">Total Payable</div>
                        </div>
                        <div class="finance-right-options">
                            <div>
                                <div class="total_desc finance-numbers"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($property['price'] - $property['outrightDiscount']); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="outrightPaymentForm" method="POST">
                    <input type="hidden" id="email" value="<?php echo $email; ?>" />
                    <input type="hidden" id="amount" value="<?php echo (@$outright_price * 0.05); ?>" />
                    <input type="hidden" id="refID" value="<?php echo md5(date('YmdHis')); ?>" />
                    <div style="width:100%;text-align:center;font-family:'Cera Pro';font-size:14px;line-height:25px;">
                        Lockdown this property with a <?php echo $property['lockdown_fee']; ?>% payment and receive your offer letter and a contract of sale
                    </div>
                    <?php if ($property['availability'] != 'Sold' && $property['availability'] != 'Locked') { ?>
                        <div style="width:100%;text-align:center;">
                            <button type="submit" class="payment-btn" onclick="payWithPaystack()">Pay Now</button>
                        </div>
                    <?php } ?>
                </form>
            </div>
            <!--- Outright payment option ---->
            <div class="book-inspection-mobile">
                <div class="single-span-col-input">
                    <button class="book-inspection-btn">Book inspection</button>
                </div>
            </div>
        </div>
    </div>
    <div class="property-right-wrapper">

        <div class="like-share-card">
            <div class="like-share-word-sect">
                <h3><?php echo $property['property_name'] ?> </h3>
                <p>at <?php echo $property['city'] . ', ' . $property['propState']; ?></p>
                <!---<p></p>--->
            </div>
            <div class="book-inspection-btn">
                <button>Book inspection</button>
            </div>
            <div class="book-inspection-like-share">
                <div class="share-container">
                    <div class="container-pointer"></div>
                    <span><a class="js-share-twitter-link" href="https://twitter.com/intent/tweet?url=<?php echo base_url() . 'property/' . $property['propertyID']; ?>"><i class="fa fa-twitter"></i></a></span>
                    <span><a href="javascript:fbShare('<?php echo base_url() . 'property/' . $property['propertyID']; ?>', '<?php echo $property['property_name']; ?>', 'Buy Small Small Property', '<?php echo base_url() . '/uploads/buytolet/' . $property['image_folder'] . '/' . $property['featured_image']; ?>', 520, 350)"><i class="fa fa-facebook"></i></a></span>
                    <span><a target="_blank" href="http://www.linkedin.com/shareArticle?url=<?php echo base_url() . 'property/' . $property['propertyID']; ?>"><i class="fa fa-linkedin"></i></a></span>
                    <span><a href="whatsapp://send?text=<?php echo base_url() . 'property/' . $property['propertyID']; ?>" data-action="share/whatsapp/share" target="_blank"><i class="fa fa-whatsapp"></i></a></span>
                </div>
                <button id="share-btn">
                    <img src="<?php echo base_url(); ?>asset/img/Vector (5).png" alt="" />
                    <span>Share</span>
                </button>
                <button class="save-property favorite-prop">
                    <img src="<?php echo base_url(); ?>asset/img/Vector (6).png" alt="" />
                    <span>Save</span>
                </button>
            </div>
        </div>

    </div>
</div>
<div class="booking-overlay">
    <div class="inspection-form-box">
        <div class="close-popup">x</div>
        <div class="popup-head">Book inspection</div>
        <div class="form-report"></div>
        <form id="inspectionForm">
            <div class="popup-label">Time</div>
            <div class="popup-field-container">
                <div class="time-div">
                    <select id="inspection-time" class="minimal inspection-time">
                        <option value="1:00">1:00</option>
                        <option value="2:00">2:00</option>
                        <option value="3:00">3:00</option>
                        <option value="4:00">4:00</option>
                        <option value="5:00">5:00</option>
                        <option value="6:00">6:00</option>
                        <option value="7:00">7:00</option>
                        <option value="8:00">8:00</option>
                        <option value="9:00">9:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                    </select>
                </div>
                <div class="period-div">
                    <select id="inspection-period" class="minimal inspection-period">
                        <option value="AM">AM</option>
                        <option value="PM">PM</option>
                    </select>
                </div>
            </div>
            <div class="popup-label">Date</div>
            <div class="popup-field-container">
                <div class="textInput-box">
                    <input class="insp-date" onclick="(this.type='date')" id="inspection-date" placeholder="Inspection date" type="text">
                </div>
            </div>
            <div class="popup-field-container">
                <input type="submit" class="inspection-booking-btn" value="Book inspection" />
            </div>
        </form>
    </div>

    <!-- Tracking code for bss inspection details and send inspection details to hubspot - Start of HubSpot Embed Code -->
	<script type="text/javascript" id="hs-script-loader" async defer src="//js-eu1.hs-scripts.com/143441522.js"></script>
    <!-- End of HubSpot Embed Code -->

</div>
<?php
    $payment_plan = 'finance';

    if($property['investment_type'] == 6){
        $payment_plan = 'bnpl';
    }else if($property['investment_type'] == 2){
        $payment_plan = 'standard-btl';
    }

?>
<input type="hidden" id="option-but" value="<?php echo $payment_plan; ?>" />
<input type="hidden" id="userID" value="<?php echo @$userID; ?>" />
<input type="hidden" class="prop-id" value="<?php echo $property['propertyID']; ?>" />
<input type="hidden" class="pool_check" value="<?php echo $property['pool_buy']; ?>" />
<input type="hidden" id="act-price" value="<?php echo $property['price']; ?>" />
<input type="hidden" id="minimum-payment-plan" value="<?php echo $property['minimum_payment_plan'] / 100; ?>" />
<input type="hidden" id="expected_rent" class="expected-rent-inp" value="<?php echo $property['expected_rent']; ?>" />
<input type="hidden" class="property_id" id="propety_id" value="<?php echo @$property['propertyID']; ?>" />
<input type="hidden" class="property_name" id="property_name" value="<?php echo @$property['property_name']; ?>" />
<input type="hidden" class="payment-plan-option" id="payment-plan-option" value="<?php echo @$property['payment_plan']; ?>" />
<input type="hidden" class="payment-plan-period" id="payment-plan-period" value="<?php echo @$property['payment_plan_period']; ?>" />
<?php if (@$property['minimum_payment_plan']) {
    $minimum = $property['minimum_payment_plan'];
} ?>

<input type="hidden" id="percentage-value" value="<?php echo @$property['minimum_payment_plan']; ?>" />

<input type="hidden" class="payment-plan-minimum" id="payment-plan-minimum" value="<?php echo $property['minimum_payment_plan'] / 100; //if(@$property['promo_category'] == 'payment-plan'){ echo @$property['promo_price'] * (@$minimum / 100); }else{ echo @$property['price'] * (@$minimum / 100); } 
                                                                                    ?>" />

<input type="hidden" class="pool_units" id="pool_units" value="<?php echo @$property['pool_units']; ?>" />
<input type="hidden" class="pool-total-cost" value="" />
<!---Own now pay later--->
<input type="hidden" class="onpl-property" id="onpl-property" value="<?php ($property['investment_type'] == 7) ? 1 : 0; ?>" />
<!---Own now pay later--->
<!---Buy now pay later--->
<input type="hidden" class="bnpl-property" id="bnpl-property" value="<?php ($property['investment_type'] == 6) ? 1 : 0; ?>" />
<!---Buy now pay later--->
<input type="hidden" class="expected-rent" id="expected-rent" value="<?php echo @$property['expected_rent']; ?>" />
<input type="hidden" class="alt-mortgage-period" id="alt-mortgage-period" value="0" />
<input type="hidden" class="total-cost" id="total-cost" value="<?php echo @$property['price']; ?>" />
<input type="hidden" class="payment" id="payment" value="<?php echo (@$property['price'] * 0.40); ?>" />
<?php if ($property['investment_type'] == 6) { ?>

    <input type="hidden" class="finance-payment" id="finance-payment" value="<?php echo (@$property['price']) + (@$property['price'] * 0.01) + (@$property['price'] * 0.04); ?>" />
    <input type="hidden" class="bnpl-payable" id="bnpl-payable" value="<?php echo (@$property['price'] * ($property['lockdown_fee'] / 100)); ?>" />

<?php } elseif ($property['investment_type'] == 7) { ?>

    <input type="hidden" class="finance-payment" id="finance-payment" value="<?php echo (@$property['price']) + (@$property['price'] * 0.01) + (@$property['price'] * 0.04); ?>" />
    <input type="hidden" class="onpl-payable" id="onpl-payable" value="<?php echo (@$property['price'] * ($property['lockdown_fee'] / 100)); ?>" />

<?php } else { ?>

    <input type="hidden" class="finance-payment" id="finance-payment" value="<?php echo (@$property['price'] * 0.40) + (@$property['price'] * 0.01) + (@$property['price'] * 0.04); ?>" />

<?php } ?>
<input type="hidden" class="subsequent-payment" id="subsequent-payment" value="0" />
<input type="hidden" class="repayment-period" id="btl-repayment-period" value="<?php echo ($property['investment_type'] == 2)? 18 : 0; ?>" />
<input type="hidden" class="total-amount" value="<?php echo @$property['price']; ?>" />
<input type="hidden" id="promo-price" class="promo-price" value="<?php if (@$property['promo_price']) {
                                                                        echo $property['promo_price'];
                                                                    } else {
                                                                        echo 0;
                                                                    } ?>" />
<input type="hidden" class="promo-category" value="<?php if (@$property['promo_category']) {
                                                        echo $property['promo_category'];
                                                    } else {
                                                        echo "none";
                                                    } ?>" />
<input type="hidden" class="fourty-percent" id="fourty-percent" value="<?php echo (@$property['price'] * 0.40); ?>" />
<input type="hidden" class="fourty-five-percent" id="fourty-five-percent" value="<?php echo (@$property['price'] * 0.45); ?>" />
<input type="hidden" class="seventy-five-percent" id="seventy-five-percent" value="<?php echo (@$property['price'] * 0.75); ?>" />
<input type="hidden" class="ninety-five-percent" id="ninety-five-percent" value="<?php echo (@$property['price'] * 0.95); ?>" />
<input type="hidden" class="one-percent" id="one-percent" value="<?php echo (@$property['price'] * 0.01); ?>" />
<input type="hidden" class="four-percent" id="four-percent" value="<?php echo (@$property['price'] * 0.04); ?>" />
<input type="hidden" class="five-percent" id="five-percent" value="<?php echo (@$property['price'] * 0.05); ?>" />


<input type="hidden" class="asset_appr_1" id="asset_appr_1" value="<?php echo @$property['asset_appreciation_1']; ?>" />
<input type="hidden" class="asset_appr_2" id="asset_appr_2" value="<?php echo @$property['asset_appreciation_2']; ?>" />
<input type="hidden" class="asset_appr_3" id="asset_appr_3" value="<?php echo @$property['asset_appreciation_3']; ?>" />
<input type="hidden" class="asset_appr_4" id="asset_appr_4" value="<?php echo @$property['asset_appreciation_4']; ?>" />
<input type="hidden" class="asset_appr_5" id="asset_appr_5" value="<?php echo @$property['asset_appreciation_5']; ?>" />
<input type="hidden" class="asset_appr_value" id="asset_appr_value" value="<?php echo @$property['asset_appreciation_1']; ?>" />
<script src="<?php echo base_url(); ?>assets/js/payment.js?version=<?php echo rand(1, 20); ?>.<?php echo rand(1, 50); ?>.<?php echo rand(1, 70); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/favorite.js"></script>
<script src="<?php echo base_url(); ?>assets/js/payment-plan-slider.js?version=<?php echo rand(1, 30); ?>.<?php echo rand(1, 70); ?>.<?php echo rand(1, 90); ?>"></script>
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
<!---Number element controller ---->
<script>
    jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.share-quantity input');
    jQuery('.share-quantity').each(function() {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            min = input.attr('min'),
            max = input.attr('max');

        btnUp.click(function() {

            var percentage_per_share = document.getElementById("pps").value;

            var oldValue = parseFloat(input.val());

            if (oldValue >= max) {

                var newVal = oldValue;

            } else {

                var newVal = oldValue + 1;

            }
            var pps = percentage_per_share * newVal;

            pps = Math.round(pps * 10) / 10;

            $('#share-amount-value').html(numberWithCommas(pps) + "%");

            spinner.find("input").val(newVal);
            10

            spinner.find("input").trigger("change");
        });

        btnDown.click(function() {

            var percentage_per_share = document.getElementById("pps").value;

            var oldValue = parseFloat(input.val());

            if (oldValue <= min) {

                var newVal = oldValue;

            } else {

                var newVal = oldValue - 1;

            }
            var pps = percentage_per_share * newVal;

            pps = Math.round(pps * 10) / 10;

            $('#share-amount-value').html(numberWithCommas(pps) + "%");

            spinner.find("input").val(newVal);

            spinner.find("input").trigger("change");
        });

    });
</script>
<script src="<?php echo base_url(); ?>asset/js/responsiveslides.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function() {

        // Slideshow 1
        $("#slider1").responsiveSlides({
            maxwidth: 1500,
            speed: 800
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
            before: function() {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function() {
                $('.events').append("<li>after event fired.</li>");
            }
        });
    });
</script>
<script src="<?php echo base_url(); ?>asset/js/payment-options.js"></script>
<?php if ($property['investment_type'] == 2) { ?>
    <script src="<?php echo base_url(); ?>asset/js/standard-btl-range-slider.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/champ-range-slider.js"></script>
<?php }else{ ?>
    <script src="<?php echo base_url(); ?>asset/js/finance-range-slider.js"></script>
<?php } ?>
<script>
    
    $('#share-btn').click(function() {

        if ($('.share-container').is(':hidden')) {

            $('.share-container').slideDown();

        } else {

            $('.share-container').slideUp();

        }
    });
</script>

<script>

    const paymentForm = document.getElementById('outrightPaymentForm');

    paymentForm.addEventListener("click", payWithPaystack, false);

    function payWithPaystack(e) {

        e.preventDefault();

        email = document.getElementById("email").value;

        if (email == '') {

            alert("Please Login/Signup to proceed.");

            $('.payment-btn').html('Pay now');

            window.location.href = baseUrl + "login";

            return false;
        }

        $('.payment-btn').html('Wait...');

        let handler = PaystackPop.setup({

            key: 'pk_live_34a3561ac7f3d3e35d118e3e4bf3777065d92f62',

            amount: document.getElementById("amount").value * 100,

            ref: document.getElementById("refID").value,

            email: email,

            onClose: function() {

                $('.payment-btn').html('Lockdown Property');

            },

            callback: function(response) {

                let message = 'Payment complete! Reference: ' + response.reference;
                updateTransaction();

            }

        });

        handler.openIframe();

    }

    function updateTransaction() {

        var payable = $('#amount').val();

        var ref = $('#refID').val();

        var propertyID = $('.prop-id').val();

        var plan = 'Outright';

        var cost = $('.total-amount').val();


        var data = {
            "propertyID": propertyID,
            "plan": plan,
            "payable": payable,
            "cost": cost,
            "ref": ref
        };

        $.ajaxSetup({
            cache: false
        });

        $.ajax({

            url: <?php echo base_url(); ?>'buytolet/updatePayment/',

            type: "POST",

            async: true,

            data: data,

            success: function(data) {

                alert("Payment update Successful!");

                window.location.href = baseURL + "/successful-payment";

            }

        });

    }
</script>
<script>
    $(document).ready(function() {
        window.localStorage.removeItem('buytolet_basket');
        window.localStorage.removeItem('buytolet_champ');
    });
</script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="<?php echo base_url('asset/js/financial-highlights.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/inspection.js'); ?>"></script>
<script>
    function insertDate() {

        $('#inspection-date').attr('type', 'date');

        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;

        var day = dtToday.getDate();

        var year = dtToday.getFullYear();

        if (month < 10)

            month = '0' + month.toString();

        if (day < 10)

            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;

        // or instead:
        // var maxDate = dtToday.toISOString().substr(0, 10);

        $('#inspection-date').attr('min', maxDate);
    }
</script>