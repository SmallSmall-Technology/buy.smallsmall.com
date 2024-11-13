<div class="row">
  <div class="col-12 mt-5">
    <p style="font-size: 22px;"><?php echo $co_details['property_name']; ?></p>
  </div>
  <div class="col-12">
    <nav class="nav">
      <li class="nav-item mr-3 ">
        <a class="nav-link primary-text-color  sub-menu--dashboard-active px-0" id="propertyBtn" href="#" role="button">Property</a>
      </li>
      <li class="nav-item mr-3">
        <a class="nav-link secondary-text-color px-0 " id="shareCertificateBtn" href="#" role="button">Property
          Shares
          Certificate</a>
      </li>
      <!---<li class="nav-item mr-3">
            <a class="nav-link secondary-text-color px-0 " id="historyBtn" href="#" role="button">History</a>
          </li>--->

    </nav>
  </div>

  <!-- Property -->
  <div class="col-12 mt-5 collapse show" id="property">
    <div class="primary-background p-md-5 p-3">
      <!---<div>
        <h6>Financial Highlights</h6>
        <div class="row">
          <div class="col-md-8 col-12">
            <div class="default-background px-4 py-3">
              <div class="unit-container d-flex mb-2">
                <div class="unit-container__percent set-unit-container" id="percent">
                  <span class="">%</span>
                </div>
                <div class="unit-container__naira" id="naira">
                  <span class="">&#8358;</span>
                </div>
              </div>
              <div>
                <table style="font-size:14px;" class="table table-responsive">
                  <thead>
                    <tr>
                      <td></td>
                      <td>Year 1</td>
                      <td>Year 2</td>
                      <td>Year 3</td>
                      <td>Year 4</td>
                      <?php //if ($co_details['hold_period'] == 'Five years' || $co_details['hold_period'] == 'Six years') { ?>
                        <th>Year 5</th>
                      <?php //} ?>
                      <?php //if ($co_details['hold_period'] == 'Six years') { ?>
                        <th>Year 6</th>
                      <?php //} ?>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td scope="row">Rent</td>
                      <td><?php //echo $co_details['co_rent_1']; ?>%</td>
                      <td><?php //echo $co_details['co_rent_2']; ?>%</td>
                      <td><?php //echo $co_details['co_rent_3']; ?>%</td>
                      <td><?php //echo $co_details['co_rent_4']; ?>%</td>
                      <?php //if ($co_details['hold_period'] == 'Five years' || $co_details['hold_period'] == 'Six years') { ?>
                        <td><?php //echo $co_details['co_rent_5']; ?>%</td>

                      <?php //} ?>
                      <?php //if ($co_details['hold_period'] == 'Six years') { ?>
                        <td><?php //echo $co_details['co_rent_6']; ?>%</td>
                      <?php //} ?>
                    </tr>
                    <tr>
                      <td scope="row">Appreciation</td>
                      <td><?php //echo $co_details['co_appr_1']; ?>%</td>
                      <td><?php //echo $co_details['co_appr_2']; ?>%</td>
                      <td><?php //echo $co_details['co_appr_3']; ?>%</td>
                      <td><?php //echo $co_details['co_appr_4']; ?>%</td>
                      <?php //if ($co_details['hold_period'] == 'Five years' || $co_details['hold_period'] == 'Six years') { ?>
                        <td><?php //echo $co_details['co_appr_5']; ?>%</td>

                      <?php //} ?>
                      <?php //if ($co_details['hold_period'] == 'Six years') { ?>
                        <td><?php //echo $co_details['co_appr_6']; ?>%</td>
                      <?php //} ?>
                    </tr>
                    <tr>
                      <td scope="row">Capital + Appreciation</td>
                      <td>&#8358;<?php //$appr_1 = $co_details['marketValue'] * ($co_details['co_appr_1'] / 100); ?>
                        <?php //echo round(($co_details['marketValue'] + $appr_1) / 1000000, 1); ?>m</td>
                      <td>&#8358;<?php //$appr_2 = $co_details['marketValue'] * ($co_details['co_appr_2'] / 100); ?>
                        <?php //echo round(($co_details['marketValue'] + $appr_2) / 1000000, 1); ?>m</td>
                      <td>&#8358;<?php //$appr_3 = $co_details['marketValue'] * ($co_details['co_appr_3'] / 100); ?>
                        <?php //echo round(($co_details['marketValue'] + $appr_3) / 1000000, 1); ?>m</td>
                      <td>&#8358;<?php //$appr_4 = $co_details['marketValue'] * ($co_details['co_appr_4'] / 100); ?>
                        <?php //echo round(($co_details['marketValue'] + $appr_4) / 1000000, 1); ?>m</td>
                      <?php //if ($co_details['hold_period'] == 'Five years' || $co_details['hold_period'] == 'Six years') { ?>
                        <td>&#8358;<?php //$appr_5 = $co_details['marketValue'] * ($co_details['co_appr_5'] / 100); ?>
                          <?php //echo round(($co_details['marketValue'] + $appr_5) / 1000000, 1); ?>m</td>

                      <?php //} ?>
                      <?php //if ($co_details['hold_period'] == 'Six years') { ?>
                        <td>&#8358;<?php //$appr_6 = $co_details['marketValue'] * ($co_details['co_appr_6'] / 100); ?>
                          <?php //echo round(($co_details['marketValue'] + $appr_6) / 1000000, 1); ?>m</td>
                      <?php //} ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>--->
          <!----- Pie chart ---->
          <!---<div class="col-md-4 d-md-block d-none">
            <div class="default-background h-100">
              <div id="donutchart" style="height: 100%"></div>
            </div>
          </div>--->
          <!----- Pie chart ---->
        <!--</div>
      </div>--->
      <!---- separator here ---->
      <div class="divider my-5"></div>

      <div class="row">
        <div class="col-12">
          <h3 class="address-title"><?php echo $co_details['property_name']; ?></h3>
          <p><?php echo $co_details['city'] . ', ' . $co_details['name']; ?></p>
        </div>
      </div>
      <div class="row my-5">
        <div class="col-md-2 col-6 my-2 my-md-0">
          <p style="font-size: 14px;" class="font-weight-light">Shares Bought</p>
          <p style="font-size: 26px;"><?php echo $co_details['unit_amount']; ?></p>
        </div>
        <div class="col-md-2 col-6 my-2 my-md-0">
          <p style="font-size: 14px;" class="font-weight-light">Paid</p>
          <p style="font-size: 26px;">&#8358;<?php echo number_format($co_details['transaction_amount']); ?></p>
        </div> 
        <div class="col-md-2 col-6 my-2 my-md-0">
          <p style="font-size: 14px;" class="font-weight-light">Property Status</p>
          <p style="font-size: 26px;"><?php echo $co_details['construction_lvl']; ?></p>
        </div>
        <div class="col-md-2 col-6 my-2 my-md-0">
          <p style="font-size: 14px;color: red" class="font-weight-bold">Upgraded</p>
          <p style="font-size: 26px;">&nbsp;</p>
        </div>
        <div class="col-md-2 col-6 my-2 my-md-0" style="display:none">
          <p style="font-size: 14px;" class="font-weight-light">Hold Period</p>
          <p style="font-size: 26px;" class="d-flex align-items-center"><?php
                                                                        if (@$co_details['hold_period'] == 'One year') {
                                                                          echo "1 year";
                                                                        } elseif (@$co_details['hold_period'] == 'Two years') {
                                                                          echo "2 years";
                                                                        } elseif (@$co_details['hold_period'] == 'Three years') {
                                                                          echo "3 years";
                                                                        } elseif (@$co_details['hold_period'] == 'Four years') {
                                                                          echo "4 years";
                                                                        } elseif (@$co_details['hold_period'] == 'Five years') {
                                                                          echo "5 years";
                                                                        } elseif (@$co_details['hold_period'] == 'Six years') {
                                                                          echo "6 years";
                                                                        } else {
                                                                          echo @$co_details['hold_period'];
                                                                        } ?></p>
        </div>
        <div class="col-md-2 col-6 my-2 my-md-0" style="display:none">
          <p style="font-size: 14px;" class="font-weight-light">Migration Date</p>
          <p style="font-size: 26px;" class="d-flex align-items-center"><?php echo date('M, Y', strtotime($co_details['maturity_date'])); ?></p>
        </div>
        <div class="col-md-2 col-6 my-2 my-md-0" style="display:none">
          <p style="font-size: 14px;" class="font-weight-light">Migration Countdown</p>
          <p style="font-size: 26px;" class="d-flex align-items-center">
            <?php
            $now = time(); // or your date as well
            $maturity_date = strtotime($co_details['maturity_date']);
            $datediff = $maturity_date - $now;
            echo round($datediff / (60 * 60 * 24));
            ?> days</p>
        </div>
      </div>
      <div class="row my-md-5">
        <div class="col-md-2 col-6 my-2 my-md-0">
          <p style="font-size: 14px;" class="font-weight-light">Payouts received</p>
          <p style="font-size: 26px;">&#8358;0</p>
        </div>
        <div class="col-md-2 col-6 my-2 my-md-0" style="display:none">
          <p style="font-size: 14px;" class="font-weight-light">Buyback Appr'n.</p>
          <p style="font-size: 26px;">&#8358;<?php echo number_format((float)$buybackrate, 2, '.', ','); ?></p>
        </div>
        <div class="col-md-2 col-6 my-2 my-md-0">
          <p style="font-size: 14px;" class="font-weight-light">Free Property Shares</p>
          <p style="font-size: 26px;"><?php echo ($co_details['purchase_beneficiary'] == 'Free')? $co_details['unit_amount'] : 0; ?></p>
        </div>
        <div class="col-md-2 col-6 my-2 my-md-0">
          <p style="font-size: 14px;" class="font-weight-light">Transferred shares</p>
          <p style="font-size: 26px;">0</p>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-3 col-5 mb-3">
          <button class="btn font-weight-light w-100 p-md-3 p-2 deactivated-background btn-custom-tertiary" type="button" data-target="#liquidate" >
            Liquidate</button>
            <!---<button class="btn font-weight-light w-100 p-md-3 p-2 tertiary-background btn-custom-tertiary" type="button" data-target="#liquidate" data-toggle="modal">
            Liquidate</button>--->
        </div>
        <div class="col-md-3 col-7 mb-3">
          <button class="btn font-weight-light w-100 p-md-3 p-2 deactivated-background btn-custom-tertiary" type="button" data-target="#transferShares" >
            Transfer Shares</button>
        </div>
        <div class="col-md-3 col-12">
          <button class="btn font-weight-light w-100 p-md-3 p-2 deactivated-background btn-custom-tertiary" type="button" data-target="#giftBasket" >
            Put in Gift Basket</button>
        </div>
        <div class="col-md-3 col-12">
          <button class="btn font-weight-light w-100 p-md-3 p-2 deactivated-background btn-custom-tertiary vote-button" type="button">
            Vote to Sell</button>
        </div>


        <!-- liqudate shares modal -->
        <div class="modal fade" id="liquidate" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header primary-background pl-5">Liquidate Shares</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body p-5">
                <form>
                  <div class="form-group">
                    <label for="liquidateShare">How man shares do you want to sell?</label>
                    <input type="text" class="form-control" id="liquidateShare" placeholder="Type number of shares">

                  </div>

                  <div class="my-4 text-center mt-5">
                    <button type="submit" class="btn btn-dark py-2 btn-custom-primary px-5" data-toggle="modal" data-target="#createWallet">Liquidate</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>

        <!-- Transfer to gift bucket shares modal -->
        <div class="modal fade" id="giftBasket" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header primary-background pl-5">
                <h5>Transfer to gift basket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body px-5">
                <p class="text-center my-4">You have &nbsp;&nbsp;<span style="font-size: 26px;"><?php echo $co_details['unit_amount']; ?></span>&nbsp;&nbsp;Property
                  shares</p>
                <form id="giftBasket">
                  <!--<div class="form-group m-2">
                        <label style="font-size: 12px;" for="numberOfShares">Name of gift basket</label>
                        <input type="text" class="form-control p-3" id="numberOfShares"
                          placeholder="Enter custom name for gift basket ">
                      </div>--->
                  <div class="form-group m-2">
                    <label style="font-size: 12px;" for="nameOfOwner">Shares to transfer</label>
                    <input type="text" class="form-control p-3" id="gift_amount" placeholder="Enter amount of share to transfer ">
                  </div>

                  <div class="my-4 text-center mt-5">
                    <button type="submit" class="btn btn-dark py-2 tertiary-background  px-5" id="giftBut">Send gift</button>
                  </div>
                  <input type="hidden" value="<?php echo $co_details['unit_amount']; ?>" class="user_shares" id="user_shares" />
                  <input type="hidden" value="<?php echo $co_details['refID']; ?>" class="request_id" id="request_id" />
                  <input type="hidden" value="<?php echo $co_details['propID']; ?>" class="property_id" id="property_id" />
                </form>
              </div>

            </div>
          </div>
        </div>

        <!-- Success after sharing shares modal -->
        <div class="modal fade d-none" id="liquidate" data-keyboard="false" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header primary-background pl-5">Liquidate Shares</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body p-5">
                <div class="d-flex flex-column justify-content-items text-center">
                  <p>Your offer has been received!!</p>
                  <p>Our team will reach out to you within 24hrs to complete the process</p>
                </div>
              </div>

            </div>
          </div>
        </div>


        <!-- Transfer shares modal -->
        <div class="modal fade" id="transferShares" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header primary-background pl-5">
                <h5>Transfer Property Shares</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body px-5">
                <p class="text-center my-4">You have &nbsp;&nbsp;<span style="font-size: 26px;"><?php echo $co_details['unit_amount']; ?></span>&nbsp;&nbsp;Property shares</p>
                <form id="transferShares">
                  <div class="form-group m-2">
                    <label style="font-size: 12px;" for="numberOfShares">Shares to transfer</label>
                    <input type="text" class="verify-txt form-control p-3" id="transfer_shares" placeholder="Enter number of shares to transfer">
                  </div>
                  <div class="form-group m-2">
                    <label style="font-size: 12px;" for="nameOfOwner">First name</label>
                    <input type="text" class="verify-txt form-control p-3" id="firstname" placeholder="First name">
                  </div>
                  <div class="form-group m-2">
                    <label style="font-size: 12px;" for="nameOfOwner">Last name</label>
                    <input type="text" class="verify-txt form-control p-3" id="lastname" placeholder="Last name">
                  </div>
                  <div class="form-group m-2">
                    <label style="font-size: 12px;" for="emailOfOwner">Email of new owner</label>
                    <input type="text" class="verify-txt form-control p-3" id="email" placeholder="Email Address">
                  </div>
                  <div class="form-group m-2">
                    <label style="font-size: 12px;" for="emailOfOwner">Phone number</label>
                    <input type="text" class="verify-txt form-control p-3" id="phone" placeholder="Phone number">
                  </div>

                  <div class="my-4 text-center mt-5">
                    <button type="submit" id="transfer-but" class="btn btn-dark py-2 btn-custom-primary px-5" data-toggle="modal" data-target="#createWallet">Transfer</button>
                  </div>
                  <input type="hidden" value="<?php echo $co_details['unit_amount']; ?>" class="user_shares" id="user_shares" />
                  <input type="hidden" value="<?php echo $co_details['unit_amount_spent']; ?>" class="user_shares_spent" id="user_shares_spent" />
                  <input type="hidden" value="<?php echo $co_details['refID']; ?>" class="request_id" id="request_id" />
                  <input type="hidden" value="<?php echo $co_details['propID']; ?>" class="property_id" id="property_id" />
                </form>
              </div>

            </div>
          </div>
        </div>

      </div>

      <!----- end of second bar ---->




    </div>

  </div>

  <!-- shares certificate -->
  <div class="col-12 mt-5 collapse" id="shareCertificate">
    <div class="primary-background py-5 px-md-0 px-4">
      <div class="certificate-container d-flex flex-wrap">

        <div class="certificate-item px-md-5 mb-md-5">
          <p><?php echo $co_details['property_name']; ?></p>
          <div class="d-flex justify-content-center mt-5">
            <div class="d-flex flex-column align-items-center">
              <?php
                $image_source = base_url().'assets/user-assets/images/pdf-icon.svg';

                if($co_details['certificate_image']){
                  $image_source = $co_details['certificate_image'];
                }
              ?>
              <img class="img-fluid d-inline-block mb-4" src="<?php echo $image_source; ?>" alt="certificate image" />
              <a href="<?php echo $co_details['shares_certificate']; ?>" target="_blank" class="btn tertiary-background d-inline-block">Download</a>
            </div>

          </div>
        </div>

        <!---<div class="certificate-item px-md-5 mb-md-5">
              <p><?php //echo $co_details['property_name']; 
                  ?></p>
              <div class="d-flex justify-content-center mt-5">
                <div class="d-flex flex-column align-items-center">
                  <img class="img-fluid d-inline-block mb-4" src="<?php //echo base_url(); 
                                                                  ?>assets/user-assets/images/pdf-icon.svg" alt="pdf-icon">
                  <a href="#" class="btn tertiary-background d-inline-block">Download</a>
                </div>

              </div>
            </div>--->

      </div>
    </div>

  </div>

  <!-- History Booking -->
  <div class="col-12 mt-5 collapse" id="history">
    <div class="current-booking">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Shares bought</th>
            <th scope="col">Property</th>
            <th scope="col">Amount paid</th>
            <th scope="col">Buying for</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($all_co_own_properties)) { ?>
            <?php foreach ($all_co_own_properties as $all_co_own_property => $value) { ?>
              <tr>
                <td><?php echo ($value['purchase_beneficiary'] == 'Self') ? $value['unit_amount'] : $value['no_of_units']; ?></td>
                <td><?php echo $value['property_name']; ?></td>
                <td>&#8358;<?php echo number_format($value['amount']); ?></td>
                <td><?php echo $value['purchase_beneficiary']; ?></td>
                <td>
                  <?php echo date('d M, Y', strtotime($value['request_date'])); ?>
                </td>
              </tr>
            <?php } ?>
          <?php } ?>
          <!---<tr>
                <td>3</td>
                <td>2 br Maisonette B2 Olivia Court Lekki</td>
                <td>&#8358;53,000</td>
                <td>Gift</td>
                <td>
                  5 May, 2021
                </td>
              </tr>
              <tr>
                <td>23</td>
                <td>2 br Maisonette B2 Olivia Court Lekki</td>
                <td>&#8358;53,000</td>
                <td>Spouse</td>
                <td>
                  5 May, 2021
                </td>
              </tr>
              <tr>
                <td>8</td>
                <td>2 br Maisonette B2 Olivia Court Lekki</td>
                <td>&#8358;53,000</td>
                <td>Children</td>
                <td>
                  5 May, 2021
                </td>
              </tr>--->

        </tbody>
      </table>
    </div>

  </div>




</div>

</main>
<script src="<?php echo base_url(); ?>assets/js/gift-basket.js"></script>
<script>
  $(document).ready(function() {
    $("#propertyBtn").click(function() {
      $("#property").addClass("show");
      $("#shareCertificate").removeClass("show");
      $("#history").removeClass("show");
      $("#shareCertificateBtn").addClass("secondary-text-color")
      $("#shareCertificateBtn").removeClass("primary-text-color sub-menu--dashboard-active")
      $("#historyBtn").addClass("secondary-text-color")
      $("#historyBtn").removeClass("primary-text-color sub-menu--dashboard-active")
      $("#propertyBtn").addClass("primary-text-color sub-menu--dashboard-active")
      $("#propertyBtn").removeClass("secondary-text-color")

    });
    $("#shareCertificateBtn").click(function() {
      $("#shareCertificate").addClass("show");
      $("#property").removeClass("show");
      $("#history").removeClass("show");
      $("#shareCertificateBtn").addClass("primary-text-color sub-menu--dashboard-active")
      $("#shareCertificateBtn").removeClass("secondary-text-color")
      $("#propertyBtn").removeClass("primary-text-color sub-menu--dashboard-active")
      $("#propertyBtn").addClass("secondary-text-color")
      $("#historyBtn").addClass("secondary-text-color")
      $("#historyBtn").removeClass("primary-text-color sub-menu--dashboard-active")

    });
    $("#historyBtn").click(function() {
      $("#history").addClass("show");
      $("#property").removeClass("show");
      $("#shareCertificate").removeClass("show");

      $("#shareCertificateBtn").addClass("secondary-text-color")
      $("#shareCertificateBtn").removeClass("primary-text-color sub-menu--dashboard-active")
      $("#propertyBtn").addClass("secondary-text-color")
      $("#propertyBtn").removeClass("primary-text-color sub-menu--dashboard-active")
      $("#historyBtn").removeClass("secondary-text-color")
      $("#historyBtn").addClass("primary-text-color sub-menu--dashboard-active")
    });


    // handles switch button for unit
    $("#percent").click(function() {
      $("#percent").addClass("set-unit-container");
      $("#naira").removeClass("set-unit-container");
    });
    $("#naira").click(function() {
      $("#naira").addClass("set-unit-container");
      $("#percent").removeClass("set-unit-container");
    });

  });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {
    packages: ["corechart"]
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Rent', 7],
      ['Capital Appreciation', 2],
    ]);

    var options = {
      title: '',
      pieHole: 0.4,
      // width: 400,
      // height: 600,
      colors: ['#662D91', '#00CDA6', ]
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
  }
</script>