  <!-- Main body content starts here -->
    <div class="row">
      <div class="col-12 mt-5">
        <p style="font-size: 22px;">Champions Basket</p>
      </div>
      <div class="col-12">
        <nav class="nav">
          <li class="nav-item mr-3 ">
            <a class="nav-link primary-text-color  sub-menu--dashboard-active px-0" id="championBtn" href="#"
              role="button">Champions Basket</a>
          </li>
          <li class="nav-item mr-3 ">
            <a class="nav-link primary-text-color px-0" id="championHistoryBtn" href="#"
              role="button">History</a>
          </li>

        </nav>
      </div>
      <!-- Property Portfolio  -->
      <div class="col-12 mt-5 collapse show" id="championBasket">
        <div class="p-md-5 p-2 primary-background">
          <div class="row">
            <div class="col-md-6 col-12 mb-3">
              <p class="custom-font-size-22">Send Gift</p>
            </div>
            
            <div class="col-md-4 col-12 mb-3">
              <div class="d-flex justify-content-between">
                <div>
                  <p></p>
                  <p class="custom-font-size-22"></p>
                </div>
                <div>
                  <p></p>
                  <p class="custom-font-size-22"></p>
                </div>
                <div>
                  <p></p>
                  <p class="custom-font-size-22"></p>
                </div>
              </div>
            </div>
            <div class="col-md-2 d-flex  mb-3">
              <div>
                  <p>Available</p>
                  <p class="custom-font-size-22"><?php echo $added_gifts['shares'] - $sent_gifts['shares_spent']; ?></p>
                </div>
            </div>
            
            <div class="row custom-form-container mx-0">
            <div class="col-12 default-background p-md-5 p-2">
              <!----Error reporting bar ---->
              <div class="error-report"></div>
              <!----Error reporting bar ---->
              
              <form id="giftSending">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="firstName">First name</label>
                    <input name="firstName" type="text" class="form-control form-control-lg verify-txt" id="firstName" placeholder="First name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="lastName">Last name</label>
                    <input name="lastName" type="text" class="form-control form-control-lg verify-txt" id="lastName" placeholder="Last name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control form-control-lg verify-txt" id="email" placeholder="Enter email">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="phone">Phone number</label>
                    <input name="phone" type="text" class="form-control form-control-lg verify-txt" id="phone" placeholder="Phone number">
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label for="noOfShares">Number of shares to gift</label>
                    <input name="noOfShares" type="text" class="form-control form-control-lg verify-txt" id="noOfShares" placeholder="Enter amount of shares">
                  </div>
                  <!---<div class="form-group col-md-6">
                    <label class=" mr-2" for="inlineFormCustomSelectPref">Property Shares Portfoilio</label>
                    <select name="requestID" class="form-control form-control-lg mr-sm-2 form-control-lg verify-txt"
                      id="inlineFormCustomSelectPref">
                      <option value="" selected>Choose portfolio</option>
                      <?php
                          //if(!empty($giftbags) && isset($giftbags)){
                               //foreach($giftbags as $giftbag => $value){
                      ?>
                                <option value="<?php //echo $value['request_id']; ?>"><?php //echo $value['property_name']." (".$value['shares'].")"; ?></option>
                      <?php
                                   
                               //}
                          //}
                      ?>
                      
                    </select>
                  </div>--->
                  
                    <input type="hidden" name="requestID" class="requestID" id="requestID" value="<?php echo $champions_property['refID']; ?>" />

                    <input type="hidden" name="available-shares" class="available-shares" id="available-shares" />
                    
                    <input type="hidden" name="unlock-shares" class="unlock-shares" id="unlock-shares" value="<?php echo ($champions_property['condition_status'] == 'Locked')? 1 : 0; ?>" />
                </div>
                <?php //echo $champions_property['condition_status']; ?>
                <div class="d-flex justify-content-end">
                    <?php if($champions_property['condition_status'] == 'Locked'){ ?>
                        <button class="btn  px-3 mr-3" style="background-color:#CCCCD3"><i class="fa-solid fa-lock"></i>&nbsp;&nbsp; Unlock & Send</button>
                    <?php }else{ ?>
                        <button type="submit" id="gift-send-but" class="btn gift-send-but btn-custom-tertiary px-5">Send</button>
                    <?php } ?>
                </div>


               </form>
            </div>
          </div>
              
              
          </div>

        </div>

      </div>
    
    <!-- Champions baskets  -->
      <div class="col-12 mt-5 collapse" id="championHistory">
        <div class="p-md-5 p-2 primary-background">
          <div class="row">
              <?php if(!empty($all_co_own_properties)){ ?>
                <?php foreach($all_co_own_properties as $all_co_own_property => $value){ ?>
                    <?php if($value['purchase_beneficiary'] == 'Champions'){ ?>
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
                                <a href="<?php echo base_url(); ?>user/co-ownership-property/<?php echo $value['reqID']; ?>" class="btn tertiary-background btn-custom-tertiary px-5">view</a>
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
    $(document).ready(function () {
      $("#championBtn").click(function () {
        $("#championBasket").addClass("show");
        $("#championHistory").removeClass("show");
        $("#championBtn").removeClass("secondary-text-color")
        $("#championBtn").addClass("primary-text-color sub-menu--dashboard-active")
        $("#championHistoryBtn").addClass("secondary-text-color")
        $("#championHistoryBtn").removeClass("primary-text-color sub-menu--dashboard-active");
        

      });
      $("#championHistoryBtn").click(function () {
        $("#championHistory").addClass("show");
        $("#championBasket").removeClass("show");
        $("#championBtn").removeClass("primary-text-color sub-menu--dashboard-active")
        $("#championBtn").addClass("secondary-text-color")
        $("#championHistoryBtn").removeClass("secondary-text-color")
        $("#championHistoryBtn").addClass("primary-text-color sub-menu--dashboard-active");

      });

    });
  </script>
  <script src="<?php echo base_url('assets/js/gift-basket.js'); ?>"></script>