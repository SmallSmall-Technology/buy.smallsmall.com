    <?php echo ($progress >= 100)? '<div class="formContainer">' : '' ;?>
        <div class="header__image">
            <div class='header__img'>
                <img src="<?php echo base_url(); ?>asset/images/personalinfo.svg" alt="personal information"  /><br/>personal info<br/>
                <input id="<?php echo ($progress >= 25)? 'personal__headinfo' : 'header__info'; ?>" type="text" />
            </div>
    
    
            <div class='header__img' >
                <img src="<?php echo base_url(); ?>asset/images/purpbriefcase.svg" alt="employment information"   /><br/>Employment info<br/>
                <input id="<?php echo ($progress >= 50)? 'personal__headinfo' : 'header__info'; ?>" type="text" />
            </div>
    
            <div class='header__img'>
                <img src="<?php echo base_url(); ?>asset/images/accountstatecolour.svg" alt="account information" /><br/>KYC Document<br/>
                <input id="<?php echo ($progress >= 75)? 'personal__headinfo' : 'header__info'; ?>" type="text" />
            </div>
    
            <div class='header__img'>
                <img src="<?php echo base_url(); ?>asset/images/summarycolor.svg" alt="summary" /><br/>summary<br/>
                <input id="<?php echo ($progress >= 100)? 'personal__headinfo' : 'header__info'; ?>" type="text" />
            </div>
        </div>