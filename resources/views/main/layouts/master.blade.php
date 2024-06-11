<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    {{-- set section title --}}
    <title> @yield('title') </title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('/images/2022_PlanToys_logo.png') }}">
    <link rel="icon" type="image/jpg" sizes="16x16" href="{{ url('/images/2022_PlanToys_logo.png') }}">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('/public/vendors/styles/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/public/vendors/styles/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ url('/public/src/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/public/vendors/styles/style.css') }}">

    <script src="{{ url('/public/js/jquery.min.js') }}"></script>

    <link rel="stylesheet" type="text/css"
        href="{{ url('/public/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ url('/public/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/public/src/plugins/jquery-steps/jquery.steps.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ url('/public/css/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/public/css/daterangepicker.css') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>

    <style>
        .footer {
            position: inherit;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
    </style>
    @yield('header_script')
</head>

<body>

    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>
        </div>
        <div class="header-right">
            {{-- <div class="user-notification">
					<div class="dropdown">
						<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
							<i class="icon-copy dw dw-notification"></i>
							<span class="badge notification-active"></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="notification-list mx-h-350 customscroll">
								<ul>
									<li>
										<a href="#">
											<img src="{{ url('/public/vendors/images/img.jpg') }}" alt="">
											<h3>John Doe</h3>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div> --}}
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="{{ url('/public/vendors/images/photo1.jpg') }}" alt="">
                        </span>
                        <span class="user-name">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        {{-- <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
							<a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
							<a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a> --}}

                        <a class="dropdown-item" href="{{ route('change_password',['id'=> Crypt::encrypt(Auth::user()->id)]) }}">
                            <i class="icon-copy ion-ios-gear-outline"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- include  navbar --}}
    @include('main.layouts.navbar')

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">

            {{-- set section content --}}
            @yield('content')

        </div>
    </div>

    @yield('footer_script')

    <!-- js -->
    <script src="{{ url('/public/vendors/scripts/core.js') }}"></script>
    <script src="{{ url('/public/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ url('/public/vendors/scripts/process.js') }}"></script>
    <script src="{{ url('/public/vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ url('/public/src/plugins/jQuery-Knob-master/jquery.knob.min.js') }}"></script>
    {{-- <script src="{{ url('/public/src/plugins/highcharts-6.0.7/code/highcharts.js') }}"></script>
    <script src="{{ url('/public/src/plugins/highcharts-6.0.7/code/highcharts-more.js') }}"></script> --}}
    <script src="{{ url('/public/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ url('/public/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    {{-- <script src="{{ url('/public/vendors/scripts/dashboard2.js') }}"></script> --}}

    <script src="{{ url('/public/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('/public/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('/public/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('/public/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ url('/public/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('/public/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('/public/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('/public/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('/public/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
    <script src="{{ url('/public/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
    <script src="{{ url('/public/src/plugins/datatables/js/vfs_fonts.js') }}"></script>
    <script src="{{ url('/public/vendors/scripts/datatable-setting.js') }}"></script>

    <script src="{{ url('/public/js/daterangepicker.min.js') }}"></script>

    <script src="{{ url('/public/src/plugins/jquery-steps/jquery.steps.js') }}"></script>
    <script src="{{ url('/public/vendors/scripts/steps-setting.js') }}"></script>

    <script src="{{ url('/public/vendors/scripts/knob-chart-setting.js') }}"></script>

</body>

</html>
