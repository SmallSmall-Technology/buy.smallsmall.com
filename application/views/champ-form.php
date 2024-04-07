<div class="header__image">

<div class='header__img'>
    <img src="<?php echo base_url(); ?>asset/images/personalinfo.svg" alt="personal information"  /><br/>personal info<br/>
    <input id="personal__headinfo" type="text" />
</div>


<div class='header__img' >
    <img src="<?php echo base_url(); ?>asset/images/purpbriefcase.svg" alt="employment information"   /><br/>Employment info<br/>
    <input id="personal__headinfo" type="text" />
</div>

<div class='header__img'>
    <img src="<?php echo base_url(); ?>asset/images/accountstatecolour.svg" alt="account information" /><br/>Account statement & ID<br/>
    <input id="personal__headinfo" type="text" />
</div>

<div class='header__img'>
    <img src="<?php echo base_url(); ?>asset/images/summary.svg" alt="summary" /><br/>summary<br/>
    <input class="header__info" type="text" />
</div>
</div>
<div class="info">
<h1> KYC</h1>

<div  class="form_elem">
    <h3 id="persona"> Child's form</h3>
</div>

<form id="champForm" method="POST">
    <div class="form__one">
        
        <div class="finance-form-elem-container">
            <input name="child_name" type="text" id="child_name" placeholder="Child's Name" class="verify-txt">
        </div>
        <div class="finance-form-elem-container">
            <!---<input type="text" class="marital_status verify-txt" id="marital__status" placeholder="Marital status" />--->
            <select name="child_age" id="child_age" class="verify-txt child_age">
                <option value="" disabled selected hidden>Age</option>
                <option value="1">1 Year Old</option>
                <option value="2">2 Years Old</option>
                <option value="3">3 Years Old</option>
                <option value="4">4 Years Old</option>
                <option value="5">5 Years Old</option>
            </select>
        </div>
        <div class="finance-form-elem-container">
            <label for="dob">Date of birth</label>
            <input  id="dob" class="verify-txt"  onfocus="(this.type='date')" type="text" placeholder="YYYY-MM-DD" />
        </div>
        <div class="finance-form-elem-container">
            <div class="uploadArea" id="dropzone-id">
                Upload ID<br />
                (International passport, Birth certificate)
                <input type="file" class="input-id identification-inp" id="upload" hidden />
                <div id="dd-dir">Drag and Drop or <span class="browse-btn-id">Browse</span></div> 
            </div>
        </div>
        <div class="finance-form-elem-container">
            <input type="hidden" id="userID" value="<?php echo @$userID; ?>" />
    
            <input type="hidden" id="idcard" value="" />
    
            <input type="hidden" id="id-state" value="0" />
            
        </div>
        <div class="finance-form-elem-container">
            
            <div id="btn__tags">
               <div id="back__btn">Back</div>
           
               <button class="champ-form-btns" type="submit" id="next__btn">Proceed</button>
            </div>
        </div>
    </div>
</form>
</div>
<script>

    var baseUrl = "https://buy.smallsmall.com/";

    let button = document.querySelector('.browse-btn-id');
    let input = document.querySelector('.input-id');

    let file;

    button.onclick = () =>{
        input.click();
    };
    
    input.addEventListener('change', function() {
        
        "use strict";
        
        var fd = new FormData();
        
        var files = $(this)[0].files[0];
        
        var folderName = $('#userID').val();
        
        var filepath = "";
        
        fd.append('files',files);        
        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        //$("#id-progress-bar").css("width", percentComplete + '%');
                        
                        if(percentComplete === 100){
                            
                            $('#id-state').val(1);
                            
                        }
                    }
                }, false);
                return xhr;
            },
            url: baseUrl+'buytolet/uploadChildIdentification/'+folderName,
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            beforeSend: function(){
                $('.browse-btn-id').html("Uploading...");
            },
            success:function(data, folder, pictures){
                filepath = folderName+'/'+files.name.replace(/\s+/g, '_');
                $('.browse-btn-id').html("Done");
                //$('#id-fileName').html("<span style='color:green;'>Successful upload</span>");
                $('#idcard').val(filepath);
    
            }
        });
    });
            
</script>
<script src="<?php echo base_url(); ?>assets/js/payment.js"></script>
<script src="<?php echo base_url(); ?>asset/js/upload-drag-and-drop.js"></script>
<script src="<?php echo base_url(); ?>asset/js/upload-page.js"></script>