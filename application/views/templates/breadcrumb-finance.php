    <?php echo ($progress >= 100)? '<div class="formContainer">' : '' ;?>
        <div class="header__image">
            <div class='header__img'>
                <img src="<?php echo base_url(); ?>asset/images/personalinfo.svg" alt="personal information"  /><br/>personal info<br/>
                <input <?php echo ($progress >= 25)? 'id="personal__headinfo"' : 'class="header__info"'; ?> type="text" />
            </div>
    
    
            <div class='header__img' >
                <img src="<?php echo base_url(); ?>asset/images/purpbriefcase.svg" alt="employment information"   /><br/>Employment info<br/>
                <input <?php echo ($progress >= 50)? 'id="personal__headinfo"' : 'class="header__info"'; ?> type="text" />
            </div>

            <div id="champ-tab" class='header__img'>
                <img src="<?php echo base_url(); ?>asset/images/accountstatecolour.svg" alt="account information" /><br/>Child's data<br/>
                <input <?php echo ($progress >= 60)? 'id="personal__headinfo"' : 'class="header__info"'; ?> type="text" />
            </div>
    
            <div class='header__img'>
                <img src="<?php echo base_url(); ?>asset/images/accountstatecolour.svg" alt="account information" /><br/>KYC Document<br/>
                <input <?php echo ($progress >= 75)? 'id="personal__headinfo"' : 'class="header__info"'; ?> type="text" />
            </div>
    
            <div class='header__img'>
                <img src="<?php echo base_url(); ?>asset/images/summarycolor.svg" alt="summary" /><br/>summary<br/>
                <input <?php echo ($progress >= 100)? 'id="personal__headinfo"' : 'class="header__info"'; ?> type="text" />
            </div>
        </div>