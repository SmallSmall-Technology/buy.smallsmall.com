<div class="row">
      <div class="col-12 mt-5">
        <p style="font-size: 22px;">Buy Now Pay Later</p>
      </div>
      <div class="col-12">
        <nav class="nav sub-nav">
          <li class="nav-item mr-3 ">
            <a class="nav-link primary-text-color  sub-menu--dashboard-active px-0" id="myPortfolioBtn" href="#"
              role="button">My
              Property</a>
          </li>
          <!---<li class="nav-item mr-3 ">
            <a class="nav-link primary-text-color px-0" id="championBtn" href="#" role="button">History</a>
          </li>--->

        </nav>
      </div>

      <!-- Property Portfolio  -->
      <?php if(isset($all_bnpl_properties) && !empty($all_bnpl_properties)): ?>
      <?php foreach( $all_bnpl_properties as $all_bnpl_prop => $value){ ?>
      <div class="col-12 mt-5 collapse show" id="myPortfolio">
        <div class="p-md-5 p-2 primary-background">
          <div class="row">
            <div class="col-md-4 col-12  mb-4">
              <div class="card border-0 default-background h-100">
                <div class="card-body">
                  <div class="d-flex justify-content-between my-2">
                    <img class="img-fluid" src="assets/images/portfolio-bag2.svg" alt="">
                    <p><?php echo date('M Y', strtotime($value['request_date'])); ?><br><small class="font-weight-lighter">BNPL</small></p>
                  </div>
                  <p class="card-text"><?php echo $value['property_name']; ?></p>
                  <div class=" mt-5">
                    <a href="<?php echo base_url(); ?>user/bpnl-property/<?php echo $value['reqID']; ?>" class="btn tertiary-background btn-custom-tertiary px-5">view</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <?php endif; ?>
      <!-- Champions baskets  -->
      <div class="col-12 mt-5 collapse" id="champion">
        <div class="p-md-5 p-2 primary-background">
          <!-- view when there is shares -->
          <div class="row ">
            <div class="col-md-4 col-12  mb-4">
              <div class="card border-0 default-background h-100">
                <div class="card-body">
                  <div class="d-flex justify-content-between my-2">
                    <img class="img-fluid" src="assets/images/portfolio-bag2.svg" alt="">
                  </div>
                  <p class="card-text">Champions Shares</p>
                  <p class="card-text font-weight-light">50 Shares</p>
                  <!-- <p class="card-text font-weight-light">Value: &#8358;2m</p> -->
                  <div class=" mt-5">
                    <a href="champions-basket.html" class="btn tertiary-background btn-custom-tertiary px-5">Start
                      sending</a>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- default view for champions basket -->
          <div class="row justify-content-center d-none">
            <div class="col-md-6 col-12 text-center">
              <p class="mb-4">Apply for free shares from us</p>
              <button type="" class="btn tertiary-background btn-custom-tertiary px-5" data-target="#shareFreeShares"
                data-toggle="modal">Give me free shares</button>
            </div>
          </div>

          <!-- The modal to share shares -->
          <div class="modal fade" id="shareFreeShares" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header primary-background pl-5">
                  <h5>Give me free shares</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body px-5">

                  <form>
                    <div class="form-group m-2">
                      <label style="font-size: 12px;" for="numberOfShares">How many shares would you like?</label>
                      <input type="text" class="form-control p-3" id="numberOfShares" placeholder="Enter amount">
                    </div>


                    <div class=" my-4 text-center mt-5">
                      <button type="submit" class="btn btn-custom-tertiary py-2 tertiary-background  px-5"
                        data-toggle="modal" data-target="#createWallet">Request</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>

</main>
<script>
  $(document).ready(function() {

    $("#myPortfolioBtn").click(function() {
      $("#myPortfolio").addClass("show");
      $("#gift").removeClass("show");
      $("#history").removeClass("show");
      $("#stp").removeClass("show");
      $("#giftBtn").addClass("secondary-text-color")
      $("#giftBtn").removeClass("primary-text-color sub-menu--dashboard-active")
      $("#historyBtn").addClass("secondary-text-color")
      $("#historyBtn").removeClass("primary-text-color sub-menu--dashboard-active")
      $("#myPortfolioBtn").addClass("primary-text-color sub-menu--dashboard-active")
      $("#stpBtn").addClass("secondary-text-color")
      $("#stpBtn").removeClass("primary-text-color sub-menu--dashboard-active")
      $("#myPortfolioBtn").removeClass("secondary-text-color")

    });
    $("#giftBtn").click(function() {
      $("#gift").addClass("show");
      $("#myPortfolio").removeClass("show");
      $("#history").removeClass("show");
      $("#stp").removeClass("show");
      $("#giftBtn").addClass("primary-text-color sub-menu--dashboard-active")
      $("#giftBtn").removeClass("secondary-text-color")
      $("#myPortfolioBtn").removeClass("primary-text-color sub-menu--dashboard-active")
      $("#myPortfolioBtn").addClass("secondary-text-color")
      $("#stpBtn").removeClass("primary-text-color sub-menu--dashboard-active")
      $("#stpBtn").addClass("secondary-text-color")
      $("#historyBtn").addClass("secondary-text-color")
      $("#historyBtn").removeClass("primary-text-color sub-menu--dashboard-active")

    });
    $("#stpBtn").click(function() {
      $("#stp").addClass("show");
      $("#myPortfolio").removeClass("show");
      $("#history").removeClass("show");
      $("#gift").removeClass("show");
      $("#stpBtn").addClass("primary-text-color sub-menu--dashboard-active")
      $("#stpBtn").removeClass("secondary-text-color")
      $("#myPortfolioBtn").removeClass("primary-text-color sub-menu--dashboard-active")
      $("#myPortfolioBtn").addClass("secondary-text-color")
      $("#giftBtn").removeClass("primary-text-color sub-menu--dashboard-active")
      $("#giftBtn").addClass("secondary-text-color")
      $("#historyBtn").addClass("secondary-text-color")
      $("#historyBtn").removeClass("primary-text-color sub-menu--dashboard-active")

    });
    $("#historyBtn").click(function() {
      $("#history").addClass("show");
      $("#myPortfolio").removeClass("show");
      $("#gift").removeClass("show");
      $("#stp").removeClass("show");
      $("#giftBtn").addClass("secondary-text-color")
      $("#giftBtn").removeClass("primary-text-color sub-menu--dashboard-active")
      $("#myPortfolioBtn").addClass("secondary-text-color")
      $("#myPortfolioBtn").removeClass("primary-text-color sub-menu--dashboard-active")
      $("#stpBtn").addClass("secondary-text-color")
      $("#stpBtn").removeClass("primary-text-color sub-menu--dashboard-active")
      $("#historyBtn").removeClass("secondary-text-color")
      $("#historyBtn").addClass("primary-text-color sub-menu--dashboard-active")
    });

  });
</script>