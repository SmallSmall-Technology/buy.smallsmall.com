<div class="row">
      <div class="col-12 mt-5">
        <p style="font-size: 22px;">Buy now pay later - 2 br Maisonette B2 Olivia Court Lekki</p>
      </div>
      <div class="col-12">
        <nav class="nav">
          <li class="nav-item mr-3 ">
            <a class="nav-link primary-text-color  sub-menu--dashboard-active px-0" id="propertyBtn" href="#"
              role="button">Property details</a>
          </li>
          <!-- <li class="nav-item mr-3">
            <a class="nav-link secondary-text-color px-0 " id="shareCertificateBtn" href="#" role="button">Property
              Shares
              Certificate</a>
          </li> -->

        </nav>
      </div>

      <!-- Property -->
      <div class="col-12 mt-5 collapse show" id="property">
        <div class="primary-background p-md-5 p-3">

          <div class="row">
            <div class="col-12">
              <h3 class="address-title">2 br Maisonette B2 Olivia Court Lekki</h3>
              <p>Agungi, Lekki, Lagos</p>
              <div class="bnpl-features">
                <p>2 bed</p>
                <p>2 bed</p>
                <p>105sqm</p>
              </div>
            </div>
          </div>
          <div class="divider my-5"></div>
          <div class="row my-5">
            <div class="col-md-3 col-6 my-2 my-md-0">
              <p style="font-size: 14px;" class="font-weight-light">Lockdown fee</p>
              <p style="font-size: 26px;">&#8358;2.52m</p>
              <p
                style="text-align: center; font-size: 8px; background-color: #138E3D; border-radius: 4px; color: #ffffff; width: 100px; padding: 5px 7px">
                Paid&Locked</p>
              <p class="d-none"
                style="text-align: center; font-size: 8px; background-color: #E8091E; border-radius: 4px; color: #ffffff; width: 100px; padding: 5px 7px">
                pending</p>
            </div>
            <div class="col-md-3 col-6 my-2 my-md-0">
              <p style="font-size: 14px;" class="font-weight-light">Minimum downpayment</p>
              <p style="font-size: 26px;">&#8358;24.52m</p>
            </div>
            <div class="col-md-3 col-6 my-2 my-md-0">
              <p style="font-size: 14px;" class="font-weight-light">Instalment period</p>
              <p style="font-size: 26px;">5 years</p>
            </div>
            <div class="col-md-3 col-6 my-2 my-md-0">
              <p style="font-size: 14px;" class="font-weight-light">Property Value</p>
              <p style="font-size: 26px;" class="d-flex align-items-center">&#8358;77,480,000</p>
            </div>
          </div>

          <div class="row my-5">
            <div class="col-md-3 col-6 my-2 my-md-0">
              <p style="font-size: 14px;" class="font-weight-light">Pending fees</p>
              <p
                style="font-size: 26px; background-color: #E8091E; border-radius: 4px; color: #ffffff; width: 117px; padding: 5px 7px">
                &#8358;2.52m</p>
            </div>
            <div class="col-md-3 col-6 my-2 my-md-0">
              <p style="font-size: 14px;" class="font-weight-light">Lockdown period</p>
              <p style="font-size: 26px;">11 months</p>
            </div>
            <div class="col-md-3 col-6 my-2 my-md-0">
              <p style="font-size: 14px;" class="font-weight-light">Fixed interest rate</p>
              <p style="font-size: 26px;">9% p.a</p>
            </div>
            <div class="col-md-3 col-6 my-2 my-md-0">
              <p style="font-size: 14px;" class="font-weight-light">Balance Payment</p>
              <p style="font-size: 26px;" class="d-flex align-items-center">&#8358;0.00</p>
            </div>
          </div>



        </div>

      </div>







    </div>

  </main>
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