<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"><!--Bootstrap v4.4.1-->
    <link rel="stylesheet" href="{{ asset('../../plugins/select2/css/select2.min.css') }}"><!--Select2 plugin-->
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}"><!--FontAwesome-->
    <link rel="stylesheet" href="{{ asset('../../plugins/fontawesome-free-6.7.2-web/css/all.css') }}" /><!--FontAwesome-->
    <link rel="stylesheet" href="{{ asset('assets/vendors/aos/aos.css') }}"><!--Scroll Animated-->
    <link rel="stylesheet" href="{{ asset('../../plugins/summernote-0.9.0-dist/summernote-lite.min.css') }}"><!--SummerNote-->
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
    <script src="{{ asset('../../plugins/summernote-0.9.0-dist/summernote-lite.min.js') }}"></script><!--SummerNote-->
</head>
<body>
    <div class="edica-loader"></div>
    <header class="edica-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.svg') }}" alt="Edica"></a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="edicaMainNav">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
                            <div class="dropdown-menu" aria-labelledby="blogDropdown">
                                <a class="dropdown-item" href="{{ route('archive') }}">Blog Archive</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mt-2 mt-lg-0">
                        @auth
                        <li class="nav-item dropdown"> <a class="nav-link" href="#"><span>{{ auth()->user()->name }}</span> </a>
                            <div class="dropdown-menu">
                                    <a href="{{ route('personal.main.index') }}" class="btn btn-outline-primary mx-2 my-1">Dashboard</a>
                                    <a href="{{ route('personal.profile.edit') }}" class="btn btn-outline-primary mx-2 my-1">Profile</a>
                                    @if (Auth::user()->role == '0')
                                        <a href="{{ route('admin.index') }}" class="btn btn-outline-primary mx-2 my-1">Admin Panel</a>
                                    @endif
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <input class="btn btn-outline-primary mx-2 my-1" type="submit" value="Logout">
                                    </form>
                            </div>
                        </li> 
                        @else
                        <li class="nav-item dropdown"> <a class="nav-link" href="#"><span>Login</span> </a>
                            <div class="dropdown-menu">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="m-2">
                                    <input class="form-control rounded" type="email" name="email" placeholder="email">
                                    <input class="form-control rounded mt-2" type="password" name="password" placeholder="password">
                                    <div class="my-2">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                          <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember">
                                          <label class="custom-control-label" for="customControlAutosizing">{{ __('Remember me') }}</label>
                                        </div>
                                      </div>
                                    <div class="mt-2"><input class="btn btn-outline-primary" type="submit" value="Login"></div>
                                </div>
                                <div class="dropdown-divider"></div>
                                @if (Route::has('password.request'))
                                    <a class="dropdown-item" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </form>
                            <a class="dropdown-item" href="{{ route('register') }}"> New around here? Sign up </a>
                            </div>
                            @endif
                        </li> <!--end::Notifications Dropdown Menu--> <!--begin::Fullscreen Toggle-->
                    </ul>
                </div>
            </nav>
            @if ($errors->any())
                <div class="alert alert-danger text-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </header>
    <main class="main my-3">
        <div class="container">

          @if (session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif

          @yield('content')
        </div>
    </main>

    <section class="edica-footer-banner-section">
        <div class="container">
            <div class="footer-banner" data-aos="fade-up">
                <h1 class="banner-title">Download it now.</h1>
                <div class="banner-btns-wrapper">
                    <button class="btn btn-success"> <img src="{{ asset('assets/images/apple@1x.svg') }}" alt="ios" class="mr-2"> App Store</button>
                    <button class="btn btn-success"> <img src="{{ asset('assets/images/android@1x.svg') }}" alt="android" class="mr-2"> Google Play</button>
                </div>
                <p class="banner-text">Add some helper text here to explain the finer details of your <br> product or service.</p>
            </div>
        </div>
    </section>
    <footer class="edica-footer" data-aos="fade-up">
        <div class="container">
            <div class="row footer-widget-area">
                <div class="col-md-3">
                    <a href="index.html" class="footer-brand-wrapper">
                        <img src="{{ asset('assets/images/logo.svg') }}" alt="edica logo">
                    </a>
                    <p class="contact-details">hello@edica.com</p>
                    <p class="contact-details">+23 3000 000 00</p>
                    <nav class="footer-social-links">
                        <a href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a href="#!"><i class="fab fa-twitter"></i></a>
                        <a href="#!"><i class="fab fa-behance"></i></a>
                        <a href="#!"><i class="fab fa-dribbble"></i></a>
                    </nav>
                </div>
                <div class="col-md-3">
                    <nav class="footer-nav">
                        <a href="#!" class="nav-link">Company</a>
                        <a href="#!" class="nav-link">Android App</a>
                        <a href="#!" class="nav-link">ios App</a>
                        <a href="#!" class="nav-link">Blog</a>
                        <a href="#!" class="nav-link">Partners</a>
                        <a href="#!" class="nav-link">Careers</a>
                    </nav>
                </div>
                <div class="col-md-3">
                    <nav class="footer-nav">
                        <a href="#!" class="nav-link">FAQ</a>
                        <a href="#!" class="nav-link">Reporting</a>
                        <a href="#!" class="nav-link">Block Storage</a>
                        <a href="#!" class="nav-link">Tools & Integrations</a>
                        <a href="#!" class="nav-link">API</a>
                        <a href="#!" class="nav-link">Pricing</a>
                    </nav>
                </div>
                <div class="col-md-3">
                    <div class="dropdown footer-country-dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="footerCountryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="flag-icon flag-icon-gb flag-icon-squared"></span> United Kingdom <i class="fas fa-chevron-down ml-2"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="footerCountryDropdown">
                            <button class="dropdown-item" href="#">
                                <span class="flag-icon flag-icon-us flag-icon-squared"></span> United States
                            </button>
                            <button class="dropdown-item" href="#">
                                <span class="flag-icon flag-icon-au flag-icon-squared"></span> Australia
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-content">
                <nav class="nav footer-bottom-nav">
                    <a href="#!">Privacy & Policy</a>
                    <a href="#!">Terms</a>
                    <a href="#!">Site Map</a>
                </nav>
                <p class="mb-0">© Edica. 2020 <a href="https://www.bootstrapdash.com" target="_blank" rel="noopener noreferrer" class="text-reset">bootstrapdash</a> . All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        AOS.init({
            duration: 1000
        });
    </script>
    <!--SummerNote-->
    <script>
            $('#summernote').summernote({
                 placeholder: 'Content',
              tabsize: 2,
              height: 120,
                 toolbar: [
                ['style', ['style']],
                   ['font', ['bold', 'underline', 'clear']],
                   ['color', ['color']],
                   ['para', ['ul', 'ol', 'paragraph']],
                   ['table', ['table']],
                   ['insert', ['link', 'video']],
                   ['view', ['codeview', 'help']]
                 ]
               });
    </script>
    <!--SummerNoteEnd-->
    <!--Select2-->
    <script src="{{ asset('../../plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
          //Initialize Select2 Elements
          $('.select2').select2()
        })
    </script>
    <!--Select2 End-->
</body>

</html>