<div class="row">
  <div class="col-12 my-5">
    <p style="font-size: 22px;">Dashboard</p>
  </div>
  <div class="col-lg-4 col-md-6 col-12  mb-4">
    <div class="card card-custom">
      <div class="card-body">
        <p class="card-text d-flex justify-content-between">
          Active Portfolio <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/portfolio-icon-index.svg" alt="" />
        </p>
        <div class="d-flex justify-content-between my-2">
          <h3 class="card-title"><?php echo $portfolio_count; ?></h3>
          <p><?php echo number_format($co_count['unit_amount']); ?> Co-ownership<br>
            <?php if (count($buy_to_let)) { ?>
              <?php echo number_format(count($buy_to_let)); ?> Buy2Let<br>
            <?php } ?>
            <?php if (count($buy_to_live)) { ?>
              <?php echo number_format(count($buy_to_live)); ?> Buy2Live
            <?php } ?>
          </p>
        </div>
        <div class="dash-divider my-3"></div>
        <div>
          <p class="card-text">Value</p>
          <h3 class="card-title">&#8358;<?php echo number_format((float)$worth, 2, '.', ','); ?></h3>
        </div>
        <div class="text-right mt-3">
          <a href="<?php echo base_url('user/property-portfolio'); ?>" class="btn btn-custom-tertiary">View</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-12 mb-4">
    <div class="card card-custom">
      <div class="card-body d-flex flex-column justify-content-between">
        <div>
          <p class="card-text d-flex justify-content-between">
            Buyback appreciation <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/arrow-trend.svg" alt="" />
          </p>
          <h3 class="card-title">&#8358;<?php echo number_format((float)$buybackrate, 2, '.', ','); ?></h3>
          <p class="card-text d-flex justify-content-between" style="font-size:14px;margin-bottom:20px;font-weight:bold;">
            Daily earnings
          </p>
          <p class="card-text d-flex justify-content-between">
            <?php
            $CI = &get_instance();

            if (isset($properties_buybackrate) && !empty($properties_buybackrate)) {
              echo '<div class="buyback-props">';
              foreach ($properties_buybackrate as $property => $value) {
                $property_name = $CI->buytolet_model->getProperty($value['propertyID'])['property_name'];

            ?>
          <div style="width:100%;min-height:10px;overflow:auto;margin-bottom:5px;font-size:14px;overflow-x:hidden">
            <span style="display:inline-block;width:200px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;float:left"><?php echo $property_name; ?></span><span style="float:right;display:inline-block;">&#8358;<?php echo round($value['buybackrate'] / $value['num_of_days'], 2); ?> <i style="color:green;transform: rotateY(0deg) rotate(45deg);" class="fa fa-arrow-up"></i></span>
          </div>
      <?php
              }
              echo '</div>';
            }

      ?>
      </p>
      <?php //print_r($properties_buybackrate); 
      ?>
        </div>
        <div class="text-right mt-3">
          <a href="#" class="btn btn-custom-tertiary">Request payout</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-12  mb-4">
    <div class="card card-custom">
      <div class="card-body d-flex flex-column justify-content-between">
        <div>
          <p class="card-text d-flex justify-content-between">
            Wallet Balance <img class="img-fluid" src="<?php echo base_url() ?>assets/user-assets/images/wallet-icon-index.svg" alt="" />
          </p>
          <h3 class="card-title">&#8358;<?php echo number_format($balance['account_balance']); ?></h3>
        </div>
        <div class="text-right mt-3">
          <a href="#" class="btn btn-custom-tertiary">Withdraw</a>
          <a href="#" class="btn btn-custom-tertiary">Top up</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-12  mb-4">
    <div class="card card-custom">
      <div class="card-body d-flex flex-column justify-content-between">
        <div>
          <p class="card-text d-flex justify-content-between">
            Gift Basket <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/basket-icon-index.svg" alt="" />
          </p>
          <h3 class="card-title"><?php echo $gift_basket['shares']; ?> Shares</h3>
        </div>
        <div class="text-right mt-3">
          <a href="<?php echo base_url('user/send-gift'); ?>" class="btn btn-custom-tertiary">Start gifting</a>
        </div>


      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-12 mb-4">
    <div class="card card-custom">
      <div class="card-body d-flex flex-column justify-content-between">
        <div>
          <p class="card-text">Upcoming Payment</p>
          <h3 class="card-title">&#8358;0</h3>
        </div>
        <div class="text-right mt-3">
          <a href="#" class="btn btn-custom-tertiary">pay now</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-6 col-12 mb-4">
    <div class="card card-custom">
      <div class="card-body d-flex flex-column justify-content-between">
        <div>
          <p class="card-text">Recurring Subscription</p>
          <h3 class="card-title">&#8358;0</h3>
        </div>

      </div>
    </div>
  </div>

</div>

</main>
<script src="<?php echo base_url('assets/js/gifts.js'); ?>"></script>