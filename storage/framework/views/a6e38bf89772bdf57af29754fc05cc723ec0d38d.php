<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>ระบบหน้าร้าน</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/adminlte.min.css')); ?>">	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/toastr/toastr.min.css')); ?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/sweetalert2/sweetalert2.min.css')); ?>">

	<meta name="author" content="Ekapab">
	
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

</head>

<body class="hold-transition login-page">
    <!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo e(asset('assets/dist/img/AdminLTELogo.png')); ?>" alt="AdminLTELogo" height="60" width="60">
</div>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-pink">
            <div class="card-header text-center">
                <b>ระบบหน้าร้าน</b>
            </div>
            <div class="card-body">
                
                <?php if(session('status')): ?>
                <div class="alert <?php echo e(session('class')); ?> alert-no-border alert-txt-colored alert-close alert-dismissible fade in" role="alert"><?php echo e(session('status')); ?>

                </div>
                <?php endif; ?>
                <form action="Authenticated" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                        <input type="text" name ="FTUsrCode" class="form-control" placeholder="รหัสพนักงาน" required>
                    <div class="input-group-append">


                    </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                        <input type="password" name="FTUsrPass" class="form-control" placeholder="รหัสผ่าน" required>
                        <div class="input-group-append">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block toastrDefaultError">Sign In</button>

                        </div>
                        <!-- /.col -->
                    </div>
                    <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-log-in" ></span>&nbsp; เข้าสู่ระบบ</button>
                    <a href="<?php echo e(url('/WorkTime')); ?>" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-time"></span>&nbsp; ลงเวลาทำงาน</a>
                    <div class="text-center">
                        Laravel v<?php echo e(Illuminate\Foundation\Application::VERSION); ?> (PHP v<?php echo e(PHP_VERSION); ?>)
                        <button type="submit" class="btn btn-primary wait">Sign In</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo e(asset('assets/plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('assets/dist/js/adminlte.min.js')); ?>"></script>
    <!-- Toastr -->
    <script src="<?php echo e(asset('assets/plugins/toastr/toastr.min.js')); ?>"></script>
    <!-- SweetAlert2 -->
    <script src="<?php echo e(asset('assets/plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <script>
        $('.toastrDefaultError').click(function() {
            //toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            $(document).Toasts('create', {
                class: 'bg-danger',
                title: 'Toast Title',
                autohide: true,
                delay: 750,
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });

        $('.wait').click(function(){
            let timerInterval
            Swal.fire({
            title: 'Auto close alert!',
            html: 'I will close in <b></b> milliseconds.',
            timer: 2000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            })
        })

    </script>
    </body>

    
                        
                
        <!--<script src="https://code.jquery.com/jquery-3.5.1.js" defer></script>-->
      
</html>
<?php /**PATH D:\Ekapab\frontend2\resources\views/Authentication/login.blade.php ENDPATH**/ ?>