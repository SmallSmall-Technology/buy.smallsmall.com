  <footer>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light justify-content-end">
        <div>
          <a class="mr-3" href="https://rent.smallsmall.com/faq">Rentsmallsmall FAQ</a>
          <a class="mr-3" href="https://buy-small-small.helpcenter.guide/collections/faq-a4e580-c57a5">Buysmallsmall FAQ</a>
          <a class="mr-3" href="https://smallsmall.com/about">About Us</a>
          <a class="" href="https://media.smallsmall.com/">Blog</a>
        </div>
      </nav>
    </div>
  </footer>
    <script>
        $(document).ready(function() {
        
            $.ajax({
                url: '<?php echo base_url('user/notification'); ?>',
                type: 'json',
                success: function(response) {
                    //  console.log('Data received:', response);
                    $('.notificationCount').html(response);
        
                    // Retrieve the notification count from the session variable
                    var notificationCount = '<?php echo $this->session->userdata('notification_count'); ?>';
        
                    $('.notificationCount').text(notificationCount);
                }
            });
        });
    </script>
</body>

</html>