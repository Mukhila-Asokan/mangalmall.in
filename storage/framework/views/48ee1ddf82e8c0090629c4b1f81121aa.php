
<?php $__env->startSection('content'); ?>
<div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
  <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
    <h2 class="mb-1 fs-7 fw-bolder text-center">Welcome to Mangal Mall</h2>
    <h5 class="mb-7 text-center">Venue Admin</h5>
   
 
    <form name = "login" method = "post" action="<?php echo e(route('venue/logincheck')); ?>">
      <?php echo csrf_field(); ?>
      <div class="mb-3">
        <label for="mobileno" class="form-label">Mobile No</label>
        <input type="text" class="form-control" id="mobileno" name="mobileno" aria-describedby="mobileno">

        
         <?php $__errorArgs = ['mobileno'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
         <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

      </div>
    
      <div class="errormessage">
      </div>

      <div class="mb-3" style="display:none" id = "mobileotp">
        <label for="mobileno" class="form-label">OTP</label>
          <div class="input-group mb-3 otp-input-group">
              <input class="form-control" type="text" name = "mobileotp[]" value="" placeholder="-" maxlength="1">
              <input class="form-control" type="text" name = "mobileotp[]" value="" placeholder="-" maxlength="1">
              <input class="form-control" type="text" name = "mobileotp[]" value="" placeholder="-" maxlength="1">
              <input class="form-control" type="text" name = "mobileotp[]" value="" placeholder="-" maxlength="1">
          </div>
          <?php $__errorArgs = ['mobileotp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <div class="infomessage">
      </div>


      <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="form-check">
          <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
          <label class="form-check-label text-dark fs-3" for="flexCheckChecked">
            Remember this Device
          </label>
        </div>
      </div>
      <button href="#" class="btn btn-primary w-100 py-8 mb-4 rounded-2"  type ="button" id = "loginsubmit" >Get OTP</button>
      <button href="#" class="btn btn-primary w-100 py-8 mb-4 rounded-2"  type ="submit" id = "loginsignin" style="display: none;">Sign In</button>
      <div class="d-flex align-items-center justify-content-center">
        <p class="fs-4 mb-0 fw-medium">New to Mangal Mall?</p>
        <a class="text-primary fw-medium ms-2" href="<?php echo e(route('venueadmin/register')); ?>">Register Here</a>
      </div>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
  

  $("#loginsubmit").click(function(e) {

    var mobileno = $("#mobileno").val();

    $.ajax({
           type:'POST',
           url:"<?php echo e(route('mobileotp')); ?>",
           dataType: 'json',
           data:{ "_token": "<?php echo e(csrf_token()); ?>", "mobileno" :mobileno},
           success:function(response){
            console.log(response);
            if(response['status'] == 'failed')
            {
              $('.errormessage').html(' <div class="alert alert-danger">'+response['message']+'</div>');
            }
            else
            {
              $('.errormessage').css('display','none');
              $("#loginsubmit").css('display','none');
              $("#loginsignin").css('display','block');
              $("#mobileotp").css('display','block');
              $('.infomessage').html(' <div class="alert alert-info">'+response['message']+'</div>');
              
            }
         },
         error: function(response) {
            console.log(response);
  
             var errors = response.responseJSON.errors;

         }         
          
        });

  });

</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('venueadmin::layouts.auth-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mangalmall\Modules/VenueAdmin\resources/views/auth/login.blade.php ENDPATH**/ ?>