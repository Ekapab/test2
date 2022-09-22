<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>ระบบหน้าร้าน</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="ekp-token" content="{{ config('API_TOKEN') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert2/sweetalert2.min.css')}}">

	<meta name="author" content="Ekapab">
	{{-- <link href="{{asset('assets/css/app.css')}}" rel="stylesheet"> --}}
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

</head>

<body class="hold-transition login-page">
    <!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('assets/img/logo-2-mob.png')}}" alt="AdminLTELogo" height="60" width="60">
</div>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-pink">
            <div class="card-header text-center">
                <b>ระบบหน้าร้าน</b>
            </div>
            <div class="card-body">
                {{-- <p class="login-box-msg">Sign in to start your session</p> --}}
                <form id="Authen"  action="Authenticated" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <i class="fas fa-user"></i>
                        </div>
                        <input type="text" id="FTUsrCode" name ="FTUsrCode" class="form-control" placeholder="รหัสพนักงาน" required autofocus>
                        <div class="input-group-append">


                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                        <input type="password" id="FTUsrPass" name="FTUsrPass" class="form-control" placeholder="รหัสผ่าน" required>
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
                        {{-- <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block toastrDefaultError">Sign In</button>
                        </div> --}}
                        <!-- /.col -->
                    </div>
                    <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-log-in" ></span>&nbsp; เข้าสู่ระบบ</button>
                    <a href="{{url('/WorkTime')}}" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-time"></span>&nbsp; ลงเวลาทำงาน</a>
                    <div class="text-center">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                        <button type="submit" class="btn btn-primary wait" onclick="doSetup('google.com')">Sign In</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{asset('assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script>
//         $('.toastrDefaultError').click(function() {
//             //toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
//             $(document).Toasts('create', {
//                 class: 'bg-danger',
//                 title: 'Toast Title',
//                 autohide: true,
//                 delay: 750,
//                 body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//             })
//         });
        var app = "{{config('app.name')}}"
        var devmode = "{{config('app.env')}}"
        console.log('devmode : '+ devmode)
        if(devmode=='local'){
            console.log('devmode : This is Dev Mode')
            var href = window.location.origin
        }else{
            console.log('devmode : This is Production Mode')
            var href = window.location.origin +'/'+ app;
        }
        var Usr = "{{Session::get('FTUsrName')}}"
        var url = window.location.href
        var Bchcode ="{{Session::get('Bchcode')}}"
        var elem = document.documentElement


        function waitload(timerInterval,text){
            Swal.fire({
                title: text ,
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
       }
//## ตัวอย่างการทำ Popup สำหรับ QR Code
async function doSetup(url){
    const screenDetails = await window.getScreenDetails()
    if (screen.isExtended && screenDetails.screens.length > 1) {
        const newChildWindow = window.open(
        url,
        'New Child Window',
        `popup,width=${800},height=${600},left=0,top=0`
        )
        newChildWindow.moveTo(screenDetails.screens[1].left, 0)
    }else{
        const newChildWindow = window.open(
        url,
        'New Child Window',
        `popup,width=${800},height=${600},left=0,top=0`
        )
    }
}

    $(document).ready(function() {
        console.log('Load')
        $('#Authen').submit(function(e){
            e.preventDefault()
            var FTUsrPass = $('#FTUsrPass').val()
            var FTUsrCode = $('#FTUsrCode').val()
            var formData = {
                'FTUsrCode' : FTUsrCode,
                'FTUsrPass' : FTUsrPass,
            }
            fetch("{{ url('Authenticated') }}", {
                method: 'POST', // or 'PUT'
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(formData),
            })
            .then(function(res) { return res.json(); })
            .then(data => {
                if(data.status==200){
                    // Next Page to data[0]
                    console.log(data)
                    window.location = href + '/aa'
                }else if(data.status==500){
                    Swal.fire({
                        icon: 'warning',
                        title: 'ไม่สามารถเข้าใช้งานได้...',
                        text: data.massage ,
                    })
                }else if(data.status==501){
                    Swal.fire({
                        icon: 'warning',
                        title: 'แจ้งเตือน...',
                        text: data.massage ,
                    })
                }else{
                    //error
                    Swal.fire({
                        icon: 'error',
                        title: 'ผิดพลาด...',
                        text: data.data ,
                    })
                }
                console.log(data)
            })
            .catch((error) => {
                console.log('Error:', error);
            })
            console.log('prevent')
            waitload('1000','รอ')

            $('#Authen')[0].reset()
        })


    })
    </script>
    </body>
</html>
