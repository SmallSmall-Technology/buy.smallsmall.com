  <!-- Main body content starts here -->
  <div class="row">
    <div class="col-12 mt-5">
      <p style="font-size: 22px;">Portfolio</p>
    </div>
    <div class="col-12">
      <nav class="nav">
        <li class="nav-item mr-3 ">
          <a class="nav-link primary-text-color  sub-menu--dashboard-active px-0" id="myPortfolioBtn" href="#" role="button">My
            Portfolio</a>
        </li>
        <li class="nav-item mr-3 ">
          <!---<a class="nav-link primary-text-color px-0" id="championBtn" href="#" role="button">Champions Basket</a>--->s
        </li>

      </nav>
    </div>
    <!-- Property Portfolio  -->
    <div class="col-12 mt-5 collapse show" id="myPortfolio">
      <div class="p-md-5 p-2 primary-background">
        <div class="row">

          <div class="col-md-4 col-12  mb-4" style="display:none">
            <div class="card border-0 default-background h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between my-2">
                  <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/portfolio-bag2.svg" alt="">
                </div>
                <p class="card-text">Buy Now Pay Later</p>
                <p class="card-text font-weight-light"><?php echo count($bnpl); ?> Property</p>
                <?php
                $bnpltotal = 0;
                for ($i = 0; $i < count($bnpl); $i++) {
                  $bnpltotal = ($bnpl[$i]['price'] + $bnpltotal) / 1000000;
                }
                ?>
                <p class="card-text font-weight-light">Value: &#8358;<?php echo $bnpltotal; ?>m</p>
                <div class=" mt-5">
                  <a href="<?php echo base_url(); ?>user/bnpl" class="btn tertiary-background px-5">view</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-12  mb-4">
            <div class="card border-0 default-background h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between my-2">
                  <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/portfolio-bag2.svg" alt="">
                </div>
                <p class="card-text">Co-ownership</p>
                <p class="card-text font-weight-light"><?php echo number_format($co_own_total['unit_amount']); ?> Shares</p>
                <?php
                //$coowntotal = 0;
                //for($i = 0; $i < count($co_own_total); $i++){
                //$coowntotal = $co_own_total[$i]['price'] + $coowntotal;
                //}
                ?>
                <p class="card-text font-weight-light">Value: &#8358;<?php echo number_format((float)$worth, 2, '.', ','); ?></p>
                <div class=" mt-5">
                  <a href="<?php echo base_url(); ?>user/co-ownership" class="btn tertiary-background px-5">view</a>
                </div>
              </div>
            </div>
          </div>



          <div class="col-md-4 col-12  mb-4" style="display:none">
            <div class="card border-0 default-background h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between my-2">
                  <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/portfolio-bag2.svg" alt="">
                </div>
                <p class="card-text">Buy2let</p>
                <p class="card-text font-weight-light"><?php echo count($buy_to_let); ?> Property</p>
                <?php
                $btlettotal = 0;
                for ($i = 0; $i < count($buy_to_let); $i++) {
                  $btlettotal = $buy_to_let[$i]['price'] + $btlettotal;
                }
                ?>
                <p class="card-text font-weight-light">Value: &#8358;<?php ?><?php echo number_format($btlettotal); ?>m</p>
                <div class=" mt-5">
                  <a href="<?php echo base_url(); ?>user/financing" class="btn tertiary-background px-5">view</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-12  mb-4" style="display:none">
            <div class="card border-0 default-background h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between my-2">
                  <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/portfolio-bag2.svg" alt="">
                </div>
                <p class="card-text">Buy2live</p>
                <p class="card-text font-weight-light"><?php echo count($buy_to_live); ?> Property</p>
                <?php
                $btlivetotal = 0;
                for ($i = 0; $i < count($buy_to_live); $i++) {
                  $btlivetotal = ($buy_to_live[$i]['price'] + $btlivetotal) / 1000000;
                }
                ?>
                <p class="card-text font-weight-light">Value: &#8358;<?php echo $btlivetotal; ?>m</p>
                <div class=" mt-5">
                  <a href="<?php echo base_url(); ?>user/outright" class="btn tertiary-background px-5">view</a>
                </div>
              </div>
            </div>
          </div>


        </div>

      </div>

    </div>

    <!-- Gift -->
    <div class="col-12 mt-5 collapse" id="gift">
      <div class="p-md-5 p-2 primary-background">
        <div class="row">
          <div class="col-12 mb-5">
            <p>This tab shows all the Property shares gift you have bought for family and friends.</p>
          </div>

          <?php if (isset($gifts) && !empty($gifts)) { ?>
            <?php foreach ($gifts as $gift => $value) { ?>
              <div class="col-md-4 col-12  mb-4">
                <div class="card card-custom">
                  <div class="card-body">
                    <div class="d-flex justify-content-between my-2">
                      <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/portfolio-bag.svg" alt="">
                      <p>May 2023<br><small class="font-weight-lighter">Gift claimed</small></p>
                    </div>
                    <div class="text-center ">
                      <p class="card-text px-4" style="font-size: 14px;">You sent <span style="font-size: 16px"><?php echo $value['no_of_units']; ?></span>
                        property shares to </p>
                      <p style="font-size: 20px;"><?php echo $value['firstname'] . ' ' . $value['lastname']; ?></p>
                      <div class=" mt-5">
                        <a href="#" class="btn btn-light px-5">view</a>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            <?php } ?>
          <?php } ?>

        </div>

      </div>

    </div>



  </div>

  <!-- Champions baskets  -->
  <div class="col-12 mt-5 collapse" id="champion">
    <div class="p-md-5 p-2 primary-background">
      <div class="row">
        <?php if (!empty($all_champions_properties)) { ?>
          <?php foreach ($all_champions_properties as $all_champions_property => $value) { ?>
            <?php if ($value['purchase_beneficiary'] == 'Champions') { ?>
              <div class="col-md-4 col-12  mb-4">
                <div class="card border-0 default-background h-100">
                  <div class="card-body">
                    <div class="d-flex justify-content-between my-2">
                      <img class="img-fluid" src="<?php echo base_url(); ?>assets/user-assets/images/portfolio-bag2.svg" alt="">
                    </div>
                    <p class="card-text">Champions Shares</p>
                    <p class="card-text font-weight-light"><?php echo $value['unit_amount']; ?> Shares</p>
                    <!-- <p class="card-text font-weight-light">Value: &#8358;2m</p> -->
                    <div class=" mt-5">
                      <a href="<?php echo base_url(); ?>user/champions-basket/<?php echo $value['refID']; ?>" class="btn tertiary-background btn-custom-tertiary px-5">view</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          <?php } ?>
        <?php } ?>


      </div>

    </div>

  </div>

  </main>
  <script>
    $(document).ready(function() {
      $("#myPortfolioBtn").click(function() {
        $("#myPortfolio").addClass("show");
        $("#champion").removeClass("show");
        $("#history").removeClass("show");
        $("#championBtn").addClass("secondary-text-color")
        $("#championBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#historyBtn").addClass("secondary-text-color")
        $("#historyBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#myPortfolioBtn").addClass("primary-text-color sub-menu--dashboard-active")
        $("#myPortfolioBtn").removeClass("secondary-text-color")

      });
      $("#championBtn").click(function() {
        $("#champion").addClass("show");
        $("#myPortfolio").removeClass("show");
        $("#history").removeClass("show");
        $("#championBtn").addClass("primary-text-color sub-menu--dashboard-active")
        $("#championBtn").removeClass("secondary-text-color")
        $("#myPortfolioBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#myPortfolioBtn").addClass("secondary-text-color")
        $("#historyBtn").addClass("secondary-text-color")
        $("#historyBtn").removeClass("primary-text-color sub-menu--dashboard-active")

      });
      $("#historyBtn").click(function() {
        $("#history").addClass("show");
        $("#myPortfolio").removeClass("show");
        $("#gift").removeClass("show");

        $("#giftBtn").addClass("secondary-text-color")
        $("#giftBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#myPortfolioBtn").addClass("secondary-text-color")
        $("#myPortfolioBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#historyBtn").removeClass("secondary-text-color")
        $("#historyBtn").addClass("primary-text-color sub-menu--dashboard-active")
      });

    });
  </script>