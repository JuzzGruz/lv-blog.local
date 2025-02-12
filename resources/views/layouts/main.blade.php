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
                <a class="navbar-brand" href="{{ route('home') }}">
                    <svg height="50px" width="50px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 474.649 474.649" xml:space="preserve" fill="#c2c2c2" stroke="#c2c2c2">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier"> 
                        <circle style="fill:#1eb38e;" cx="236.967" cy="236.985" r="236.967"></circle> 
                        <path style="fill:#1c9c7c;" d="M405.239,70.083c92.542,92.546,92.549,242.588,0,335.141c-92.542,92.542-242.599,92.546-335.144,0 L405.239,70.083z"></path> 
                        <path style="fill:#03684a;" d="M465.576,299.447L295.571,129.45l-34.634,34.638l-95.049-13.358l19.592,88.811l-68.306,68.306 l24.011,24.011l-5.923,5.923l133.93,133.934C363.971,458.828,440.895,389.938,465.576,299.447z"></path> 
                        <path style="fill:#FFFFFF;" d="M286.12,362.458c44.363,0,80.4-36.138,80.651-80.258l0.498-64.961l-0.745-3.536l-2.129-4.445 l-3.607-2.791c-4.681-3.667-28.404,0.247-34.791-5.549c-4.528-4.138-5.235-11.618-6.612-21.751 c-2.548-19.629-4.15-20.655-7.229-27.304c-11.169-23.633-41.474-41.392-62.293-43.843h-56.396c-44.37,0-80.643,36.194-80.643,80.396 v93.784c0,44.119,36.269,80.258,80.643,80.258H286.12z M194.494,173.696h44.707c8.539,0,15.454,6.93,15.454,15.353 c0,8.389-6.915,15.379-15.454,15.379h-44.707c-8.535,0-15.439-6.99-15.439-15.379C179.056,180.626,185.959,173.696,194.494,173.696z M179.056,281.007c0-8.419,6.904-15.293,15.439-15.293h90.847c8.483,0,15.368,6.874,15.368,15.293 c0,8.314-6.889,15.296-15.368,15.296h-90.847C185.959,296.303,179.056,289.321,179.056,281.007z"></path> 
                        </g>
                    </svg>
                </a>
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
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <svg height="50px" width="50px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 474.649 474.649" xml:space="preserve" fill="#c2c2c2" stroke="#c2c2c2">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier"> 
                            <circle style="fill:#1eb38e;" cx="236.967" cy="236.985" r="236.967"></circle> 
                            <path style="fill:#1c9c7c;" d="M405.239,70.083c92.542,92.546,92.549,242.588,0,335.141c-92.542,92.542-242.599,92.546-335.144,0 L405.239,70.083z"></path> 
                            <path style="fill:#03684a;" d="M465.576,299.447L295.571,129.45l-34.634,34.638l-95.049-13.358l19.592,88.811l-68.306,68.306 l24.011,24.011l-5.923,5.923l133.93,133.934C363.971,458.828,440.895,389.938,465.576,299.447z"></path> 
                            <path style="fill:#FFFFFF;" d="M286.12,362.458c44.363,0,80.4-36.138,80.651-80.258l0.498-64.961l-0.745-3.536l-2.129-4.445 l-3.607-2.791c-4.681-3.667-28.404,0.247-34.791-5.549c-4.528-4.138-5.235-11.618-6.612-21.751 c-2.548-19.629-4.15-20.655-7.229-27.304c-11.169-23.633-41.474-41.392-62.293-43.843h-56.396c-44.37,0-80.643,36.194-80.643,80.396 v93.784c0,44.119,36.269,80.258,80.643,80.258H286.12z M194.494,173.696h44.707c8.539,0,15.454,6.93,15.454,15.353 c0,8.389-6.915,15.379-15.454,15.379h-44.707c-8.535,0-15.439-6.99-15.439-15.379C179.056,180.626,185.959,173.696,194.494,173.696z M179.056,281.007c0-8.419,6.904-15.293,15.439-15.293h90.847c8.483,0,15.368,6.874,15.368,15.293 c0,8.314-6.889,15.296-15.368,15.296h-90.847C185.959,296.303,179.056,289.321,179.056,281.007z"></path> 
                            </g>
                        </svg>
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