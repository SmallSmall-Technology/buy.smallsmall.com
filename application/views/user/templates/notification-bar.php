    <div class="popup-container">
        <!-- pop 1 -->
        <?php //print_r($notifier); ?>
          <div class="pop-up-container <?php echo ( !empty($b_notifier) && isset($b_notifier['id']) )? 'd-lg-block' : '' ; ?> d-none">
            <div class="pop-up">
              <p style="font-weight: 500">Congratulations</p>
              <p style="font-weight: 400" class="mb-3">You have been sent <?php echo (!empty($b_notifier))? $b_notifier['unit_amount'] : '' ; ?> free shares claim it now.</p>
              <div>
                <button id="accept-shares-<?php echo $b_notifier['refID'].'-'.$b_notifier['id']; ?>" class="btn btn-custom-tertiary accept-shares">Accept</button>
                <button id="reject-shares-<?php echo $b_notifier['refID'].'-'.$b_notifier['id']; ?>" class="btn btn-danger reject-shares">Reject</button>
              </div>
            </div>
          </div>
    
          <!-- pop 2 -->
          <div class="pop-up-container <?php echo ( !empty($notifier) && isset($notifier['id']) )? 'd-lg-block' : '' ; ?> d-none">
            <div class="pop-up">
              <p style="font-weight: 500">Congratulations</p>
              <p style="font-weight: 400" class="mb-3">We have sent you <?php echo (!empty($notifier))? $notifier['unit_amount'] : '' ; ?> shares</p>
              <div>
                <button class="btn btn-custom-tertiary"><a style="color:#FFF;text-decoration:none" href="<?php echo base_url('user/property-portfolio'); ?>">Goto Champions gift basket</a></button>
              </div>
            </div>
          </div>
    
          <!-- pop 3 -->
          <div class="pop-up-container d-lg-block d-none">
            <div class="pop-up">
              <p style="font-weight: 500">Would you like to earn more shares?</p>
              <p style="font-weight: 400" class="mb-3">Buy and get free shares now!</p>
              <div>
                <button class="btn btn-custom-tertiary"><a style="color:#FFF;text-decoration:none" href="<?php echo base_url(); ?>">Buy shares</a></button>
              </div>
            </div>
          </div>
    
          <!--End Notification pop ups -->
    </div>