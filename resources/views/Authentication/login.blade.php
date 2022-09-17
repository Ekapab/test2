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
    <img class="animation__shake" src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
</div>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-pink">
            <div class="card-header text-center">
                <b>ระบบหน้าร้าน</b>
            </div>
            <div class="card-body">
                {{-- <p class="login-box-msg">Sign in to start your session</p> --}}
                @if(session('status'))
                <div class="alert {{ session('class') }} alert-no-border alert-txt-colored alert-close alert-dismissible fade in" role="alert">{{ session('status') }}
                </div>
                @endif
                <form action="Authenticated" method="post">
                    @csrf
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
                    <a href="{{url('/WorkTime')}}" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-time"></span>&nbsp; ลงเวลาทำงาน</a>
                    <div class="text-center">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
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
{{--
<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<h1 class="h2">ระบบหน้าร้าน</h1>
									</div>
									<form>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
											<small>
            <a href="index.html">Forgot password?</a>
          </small>
										</div>
										<div>
											<label class="form-check">
            <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
            <span class="form-check-label">
              Remember me next time
            </span>
          </label>
										</div>
										<div class="text-center mt-3">

											<button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                                            <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-log-in" ></span>&nbsp; เข้าสู่ระบบ</button>
                        <a href="{{url('/WorkTime')}}" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-time"></span>&nbsp; ลงเวลาทำงาน</a>
                        <div class="text-center">
                            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                        </div>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

</body> --}}
    {{-- <body onload="openFullscreen();">
        <input type="hidden" id="appname" value="{{ config('app.name') }}">
        <div class="page-center">
            <div class="page-center-in">
                <div class="container-fluid">
					<form class="sign-box" action="Authenticated" method="POST">
                        @csrf
                        <header class="sign-title">ระบบหน้าร้าน</header>

                        @if(session('status'))
                        <div class="alert {{ session('class') }} alert-no-border alert-txt-colored alert-close alert-dismissible fade in" role="alert">{{ session('status') }}
                        </div>
                        @endif
                        <div class="form-group">
                            <input type="text" class="form-control" name="FTUsrCode" required autocomplete="off" autofocus placeholder="รหัสพนักงาน"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="FTUsrPass"  required autocomplete="off" placeholder="รหัสผ่าน"/>
                        </div>
                        {{-- <input type="checkbox" onclick="openFullscreen();">full screen mode --}}
                        {{-- <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-log-in" ></span>&nbsp; เข้าสู่ระบบ</button>
                        <a href="{{url('/WorkTime')}}" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-time"></span>&nbsp; ลงเวลาทำงาน</a>
                        <div class="text-center">
                            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                        </div>
				   </Form>

                   {{-- { { phpinfo();}  --}}
                {{-- </div>
            </div>
        </div>
        <script src="{{asset('assets/js/lib/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/lib/tether/tether.min.js')}}"></script>
        <script src="{{asset('assets/js/lib/bootstrap/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/lib/match-height/jquery.matchHeight.min.js')}}"></script> --}}
        <!--<script src="https://code.jquery.com/jquery-3.5.1.js" defer></script>-->
      {{-- /ullscreen();
                    } else if (elem.msRequestFullscreen) { /* IE11 */
                        elem.msRequestFullscreen();
                    }
                }


                $(function() {
                    $('.page-center').matchHeight({
                        target: $('html')
                    });

                    $(window).resize(function(){
                        setTimeout(function(){
                            $('.page-center').matchHeight({ remove: true });
                            $('.page-center').matchHeight({
                                target: $('html')
                            });
                        },100);
                    });
                });

/
        </script> --}}
</html>
