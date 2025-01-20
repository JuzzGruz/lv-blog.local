<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>AdminBlog</title><!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE v4 | Dashboard">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"><!--end::Primary Meta Tags--><!--begin::Fonts-->
    <link rel="stylesheet" href="{{ asset('../../plugins/select2/css/select2.min.css') }}"><!--Select2 plugin-->
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css') }}" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css') }}" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous"><!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css') }}" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('../../dist/css/adminlte.css') }}"><!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css') }}" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"><!-- jsvectormap -->
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css') }}" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('../../plugins/fontawesome-free-6.7.2-web/css/all.css') }}" />
    <script src="{{ asset('https://code.jquery.com/jquery-3.4.1.slim.min.js') }}" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('../../plugins/summernote-0.9.0-dist/summernote-lite.min.css') }}">
    <script src="{{ asset('../../plugins/summernote-0.9.0-dist/summernote-lite.min.js') }}"></script>
</head> <!--end::Head--> <!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper"> <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
                    <li class="nav-item d-none d-md-block"> <a href="{{ route('home') }}" class="nav-link">Home</a> </li>
                </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
                    <li class="nav-item dropdown user-menu"> 
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> 
                            @if (!isset($user->avatar))
                                <img src="{{ asset('storage/usersavatars/!__Profile_logo_standart__!__b85303fcabfe4845b19afa565e8fce6fe112a3ff935c.jpg') }}" class="user-image rounded-circle shadow" alt="avatar" width="25" height="25" />
                            @else
                                <img src="{{ asset('storage/' . $user->avatar) }}" class="user-image rounded-circle shadow" alt="avatar" width="25" height="25" />
                            @endif
                            <span class="d-none d-md-inline">{{ $user->name }}</span> 
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <!--begin::User Image-->
                            <li class="user-header text-bg-primary"> 
                                @if (!isset($user->avatar))
                                    <img src="{{ asset('storage/usersavatars/!__Profile_logo_standart__!__b85303fcabfe4845b19afa565e8fce6fe112a3ff935c.jpg') }}" class="rounded-circle shadow" alt="avatar" width="25" height="25" />
                                @else
                                    <img src="{{ asset('storage/' . $user->avatar) }}" class="rounded-circle shadow" alt="avatar" width="25" height="25" />
                                @endif
                                <p>{{ $user->name }}</p>
                            </li> <!--end::User Image--> <!--begin::Menu Body-->
                            <li class="user-footer"> 
                                <a href="{{ route('personal.profile.edit') }}" class="btn btn-default btn-flat float-start">Profile</a> 
                                <a href="{{ route('personal.main.index') }}" class="btn btn-default btn-flat float-start">Dashboard</a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <input class="btn btn-default btn-flat float-end" type="submit" value="Log out">
                                </form> 
                            </li> <!--end::Menu Footer-->
                        </ul>
                    </li> <!--end::User Menu Dropdown-->
                </ul> <!--end::End Navbar Links-->
            </div> <!--end::Container-->
        </nav> <!--end::Header--> <!--begin::Sidebar-->

        @include('admin.includes.sidebar')
        @yield('content')

        <footer class="app-footer"> <!--begin::To the end-->
            <div class="float-end d-none d-sm-inline"></div> <!--end::To the end--> <!--begin::Copyright--> <strong>
                <a href="" class="text-decoration-none btn btn-primary btn-circle"><svg fill="#ffffff" width="25px" height="25px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="m23.456 5.784c-.27.849-.634 1.588-1.09 2.259l.019-.03q-.672 1.12-1.605 2.588-.8 1.159-.847 1.2c-.138.173-.234.385-.267.618l-.001.007c.027.212.125.397.268.535l.4.446q3.21 3.299 3.611 4.548c.035.092.055.198.055.309 0 .194-.062.373-.167.52l.002-.003c-.176.181-.422.293-.694.293-.03 0-.061-.001-.09-.004h.004-2.631c-.001 0-.003 0-.005 0-.337 0-.647-.118-.89-.314l.003.002c-.354-.291-.669-.606-.951-.948l-.009-.012q-.691-.781-1.226-1.315-1.782-1.694-2.63-1.694c-.021-.002-.045-.003-.07-.003-.165 0-.319.051-.446.138l.003-.002c-.104.13-.167.298-.167.479 0 .036.002.07.007.105v-.004c-.027.314-.043.679-.043 1.048 0 .119.002.237.005.355v-.017 1.159c.01.047.016.101.016.156 0 .242-.11.458-.282.601l-.001.001c-.387.177-.839.281-1.316.281-.102 0-.202-.005-.301-.014l.013.001c-1.574-.03-3.034-.491-4.275-1.268l.035.02c-1.511-.918-2.763-2.113-3.717-3.525l-.027-.042c-.906-1.202-1.751-2.56-2.471-3.992l-.07-.154c-.421-.802-.857-1.788-1.233-2.802l-.06-.185c-.153-.456-.264-.986-.31-1.535l-.002-.025q0-.758.892-.758h2.63c.024-.002.052-.003.081-.003.248 0 .477.085.658.228l-.002-.002c.2.219.348.488.421.788l.003.012c.484 1.367.997 2.515 1.587 3.615l-.067-.137c.482.97 1.015 1.805 1.623 2.576l-.023-.031q.8.982 1.248.982c.009.001.02.001.032.001.148 0 .277-.08.347-.2l.001-.002c.074-.19.117-.411.117-.641 0-.049-.002-.098-.006-.146v.006-3.879c-.021-.457-.133-.884-.32-1.267l.008.019c-.124-.264-.273-.492-.45-.695l.003.004c-.164-.164-.276-.379-.311-.619l-.001-.006c0-.17.078-.323.2-.423l.001-.001c.121-.111.283-.178.46-.178h.008 4.146c.022-.003.047-.004.073-.004.195 0 .37.088.486.226l.001.001c.103.188.164.413.164.651 0 .038-.002.075-.005.112v-.005 5.173c-.002.024-.003.052-.003.08 0 .184.051.357.139.504l-.002-.004c.073.108.195.178.333.178h.001c.176-.012.336-.07.471-.162l-.003.002c.272-.187.506-.4.709-.641l.004-.005c.607-.686 1.167-1.444 1.655-2.25l.039-.07c.344-.57.716-1.272 1.053-1.993l.062-.147.446-.892c.155-.446.571-.76 1.06-.76.019 0 .038 0 .057.001h-.003 2.631q1.066 0 .8.981z"></path></g></svg></a>
                <a href="" class="text-decoration-none btn btn-danger btn-circle"><svg fill="#000000" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25px" height="25px" viewBox="0 0 512 512" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="7935ec95c421cee6d86eb22ecd1368a9"> <path style="display: inline;" d="M34.354,0.5h45.959l29.604,91.096h2.863L141.013,0.5h46.353l-53.107,133.338v94.589H88.641V138.08 L34.354,0.5z M192.193,98.657c0-13.374,5.495-24.003,16.493-31.938c10.984-7.934,25.749-11.901,44.3-11.901 c16.893,0,30.728,4.192,41.506,12.55c10.805,8.358,16.193,19.112,16.193,32.287v89.2c0,14.771-5.301,26.373-15.868,34.782 c-10.579,8.408-25.151,12.625-43.684,12.625c-17.859,0-32.143-4.342-42.866-13.024c-10.709-8.683-16.074-20.36-16.074-35.057 V98.657z M234.205,191.424c0,4.766,1.44,8.409,4.354,11.029c2.907,2.595,7.055,3.867,12.451,3.867c5.532,0,9.93-1.297,13.18-3.942 c3.256-2.669,4.891-6.313,4.891-10.954V97.359c0-3.768-1.672-6.812-4.99-9.132c-3.318-2.321-7.679-3.494-13.081-3.494 c-4.972,0-9.027,1.173-12.133,3.494c-3.119,2.32-4.672,5.364-4.672,9.132V191.424z M459.992,57.588v172.711h-40.883v-19.063 c-7.547,7.037-15.381,12.375-23.541,16.069c-8.146,3.643-16.068,5.489-23.729,5.489c-9.455,0-16.592-2.57-21.383-7.71 c-4.791-5.141-7.186-12.85-7.186-23.13V57.588h40.895v132.39c0,4.117,0.861,7.061,2.57,8.907c1.723,1.822,4.492,2.745,8.322,2.745 c3.018,0,6.824-1.223,11.4-3.643c4.604-2.42,8.82-5.514,12.65-9.282V57.588H459.992z M421.68,363.262 c-2.008-2.221-5.203-3.368-9.594-3.368c-4.59,0-7.883,1.147-9.879,3.368c-1.996,2.245-2.994,5.963-2.994,11.153v10.754h25.473 v-10.754C424.686,369.225,423.688,365.507,421.68,363.262z M300.855,444.228c2.195,0.898,4.516,1.322,6.961,1.322 c3.543,0,6.113-0.849,7.785-2.595c1.67-1.722,2.494-4.591,2.494-8.533v-62.178c0-4.191-1.023-7.36-3.068-9.531 c-2.059-2.171-5.064-3.244-8.957-3.244c-2.059,0-4.092,0.399-6.102,1.198c-2.008,0.823-3.991,2.096-5.95,3.792v75.402 C296.364,441.907,298.646,443.354,300.855,444.228z M490.496,312.587c0-29.941-30.754-54.219-68.654-54.219 c-54.068-1.822-109.396-2.62-165.842-2.521c-56.427-0.1-111.756,0.698-165.843,2.521c-37.881,0-68.633,24.277-68.633,54.219 c-2.277,23.678-3.263,47.381-3.175,71.085c-0.087,23.703,0.898,47.406,3.175,71.11c0,29.916,30.752,54.192,68.633,54.192 c54.087,1.797,109.416,2.596,165.843,2.521c56.446,0.075,111.774-0.724,165.842-2.521c37.9,0,68.654-24.276,68.654-54.192 c2.27-23.704,3.254-47.407,3.154-71.11C493.75,359.968,492.766,336.265,490.496,312.587z M121.251,463.465v1.797H88.778v-1.797 V321.644H55.182v-1.771v-22.605v-1.771h99.672v1.771v22.605v1.771h-33.603V463.465z M236.768,341.33v122.135v1.797h-28.831v-1.797 v-11.901c-5.327,5.064-10.848,8.882-16.592,11.527c-5.757,2.619-11.334,3.942-16.748,3.942c-6.662,0-11.684-1.847-15.065-5.515 c-3.387-3.692-5.078-9.231-5.078-16.617v-1.797V341.33v-1.772h28.844v1.772v93.216c0,2.92,0.599,5.065,1.802,6.363 c1.217,1.322,3.175,1.971,5.876,1.971c2.127,0,4.803-0.873,8.047-2.595c3.231-1.747,6.2-3.967,8.914-6.662V341.33v-1.772h28.831 V341.33z M347.775,370.847v66.943v1.797c0,8.808-2.258,15.544-6.773,20.235c-4.518,4.641-11.055,6.986-19.588,6.986 c-5.639,0-10.652-0.898-15.07-2.695c-4.428-1.821-8.532-4.616-12.325-8.384v7.735v1.797h-29.105v-1.797V297.267v-1.771h29.105 v1.771v52.297c3.893-3.793,8.009-6.662,12.376-8.608c4.379-1.971,8.809-2.969,13.273-2.969c9.107,0,16.094,2.645,20.896,7.935 c4.803,5.289,7.211,12.999,7.211,23.13V370.847z M454.365,374.64v29.767v1.797h-55.152v21.581c0,6.513,0.947,11.029,2.844,13.549 c1.908,2.521,5.152,3.793,9.742,3.793c4.779,0,8.135-1.073,10.043-3.219c1.896-2.121,2.844-6.837,2.844-14.123v-6.811v-1.796h29.68 v1.796v7.51v1.796c0,12.7-3.605,22.257-10.84,28.694c-7.225,6.438-18.016,9.631-32.375,9.631c-12.912,0-23.066-3.418-30.49-10.229 c-7.41-6.812-11.127-16.193-11.127-28.096v-1.796V374.64v-1.771c0-10.754,4.078-19.512,12.213-26.299 c8.146-6.762,18.689-10.155,31.588-10.155c13.199,0,23.328,3.144,30.416,9.406c7.061,6.264,10.615,15.296,10.615,27.048V374.64z"> </path> </g> </g></svg></a>
                <a href="" class="text-decoration-none btn btn-info btn-circle"><svg height="25px" width="25px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.999 511.999" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#C3C3C7;" d="M165.323,267.452L395.89,125.446c4.144-2.545,8.407,3.058,4.849,6.359L210.454,308.684 c-6.688,6.226-11.003,14.558-12.225,23.602l-6.482,48.036c-0.858,6.414-9.868,7.05-11.638,0.843l-24.929-87.595 C152.325,283.578,156.486,272.907,165.323,267.452z"></path> <path style="fill:#DEDEE0;" d="M9.043,246.86l117.975,44.032l45.664,146.854c2.922,9.405,14.423,12.882,22.057,6.641l65.761-53.61 c6.893-5.617,16.712-5.897,23.916-0.667l118.61,86.113c8.166,5.936,19.736,1.461,21.784-8.407l86.888-417.947 c2.236-10.779-8.356-19.772-18.62-15.802L8.905,220.845C-3.043,225.453-2.939,242.369,9.043,246.86z M165.323,267.452 L395.89,125.446c4.144-2.545,8.407,3.058,4.849,6.359L210.454,308.684c-6.688,6.226-11.003,14.558-12.225,23.602l-6.482,48.036 c-0.858,6.414-9.868,7.05-11.638,0.843l-24.929-87.595C152.325,283.578,156.486,272.907,165.323,267.452z"></path> </g></svg></a>
            </strong>
            <!--end::Copyright-->
        </footer> <!--end::Footer-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js') }}" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js') }}" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js ') }}" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ asset('../../dist/js/adminlte.js') }}"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script> <!--end::OverlayScrollbars Configure--> <!-- OPTIONAL SCRIPTS --> <!-- sortablejs -->
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
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js') }}" integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ=" crossorigin="anonymous"></script> <!-- sortablejs -->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js') }}" integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script> <!-- ChartJS -->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js') }}" integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y=" crossorigin="anonymous"></script>
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js') }}" integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY=" crossorigin="anonymous"></script> <!-- jsvectormap -->
</body><!--end::Body-->

</html>