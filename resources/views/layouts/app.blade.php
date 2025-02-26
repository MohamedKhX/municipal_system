<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


        <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href=" {{ asset('css/fontawsome.min.css') }} ">
        <link rel="stylesheet" href=" {{ asset('fonts/flaticon.css') }} ">
        <link rel="stylesheet" href=" {{ asset('css/meanmenu.min.css') }} ">
        <link rel="stylesheet" href=" {{ asset('css/owl.carousel.min.css') }} ">
        <link rel="stylesheet" href=" {{ asset('css/nice-select.min.css') }} ">
        <link rel="stylesheet" href=" {{ asset('css/owl.theme.default.min.css') }} ">
        <link rel="stylesheet" href=" {{ asset('css/magnific-popup.min.css') }} ">
        <link rel="stylesheet" href=" {{ asset('css/jquery-ui.min.css') }} ">
        <link rel="stylesheet" href=" {{ asset('css/odometer.min.css') }} ">
        <link rel="stylesheet" href=" {{ asset('css/style.css') }}">
        <link rel="stylesheet" href=" {{ asset('css/responsive.css') }} ">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;600;800&display=swap" rel="stylesheet">

        <style>
            * {
                font-family: 'Rubik', sans-serif !important;
            }
        </style>

        <style>
            .events-card:before {
                width: 100% !important;
            }
            .events-card .events-card-text {
                opacity: 1 !important;
            }
        </style>

        <style>
            .nice-select {
                text-align: right !important;
                margin-right: 20px !important;
                padding: 10px 20px !important;
                border: 2px solid #e8e5e5;
                margin-bottom: 20px !important;
            }
        </style>
        <style>
            .blog-date ul li::before {
                content: "" !important;
                position: absolute;
                right: 0 !important;
            }

            .blog-date ul li {
                margin-right: 0 !important;
            }
        </style>
        @stack('styles')
    </head>
    <body>
        <div class="navbar-area">
            <div class="main-responsive-nav">
                <div class="container">
                    <div class="mobile-nav">
                        <a href="index.html" class="logo"><img width="30" src="{{ asset('images/logo.png') }}" alt="logo"/></a>
                    </div>
                </div>
            </div>

            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand d-flex align-items-center gap-3" href="index.html">
                            <img src="{{ asset('images/logo.png') }}" width="50" alt="logo"/>
                            منصة بلديتي
                        </a>
                        @auth()
                            <a class="position-relative" style="margin-right: 100px" href="{{ route('notification') }}">
                                <i class="fas fa-bell"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ auth()->user()->unreadNotifications->count() }}
                            <span class="visually-hidden">unread messages</span>
                          </span>
                            </a>
                        @endauth
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav justify-content-center flex-grow-1">
                                <li class="nav-item"><a href="{{ route('home',           getCurrentMunicipality()) }}" class="nav-link">الصفحة الرئيسية</a></li>
                                <li class="nav-item"><a href="{{ route('reports.index',  getCurrentMunicipality()) }}" class="nav-link">البلاغات</a></li>
                                <li class="nav-item"><a href="{{ route('news.index',     getCurrentMunicipality()) }}" class="nav-link">الأخبار</a></li>
                                <li class="nav-item"><a href="{{ route('services.index', getCurrentMunicipality()) }}" class="nav-link">الخدمات</a></li>
                                <li class="nav-item"><a href="{{ route('requests',       getCurrentMunicipality()) }}" class="nav-link">التراخيص والتصاريح</a></li>
                            </ul>
                            <div class="menu-sidebar">
                                <ul class="navbar-nav">
                                    @auth
                                        <li class="nav-item ">
                                            <a href="index-3.html#" class="nav-link dropdown-toggle d-flex align-items-center" style="gap: 5px">
                                                <span>{{ auth()->user()->name }}</span>
                                                <i class="fa-solid fa-user"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                @if(auth()->user()->type == \App\Enums\UserType::Employee)
                                                    <li class="nav-item"><a href="/municipality" class="nav-link">لوحة التحكم</a></li>
                                                @elseif(auth()->user()->type == \App\Enums\UserType::Admin)
                                                    <li class="nav-item"><a href="/admin" class="nav-link">لوحة التحكم</a></li>
                                                @endif
                                                <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link">تسجيل خروج</a></li>
                                            </ul>
                                        </li>
                                    @else
                                        <li>
                                            <a class="default-button" href="{{ route('logout') }}">
                                                <i class="fas fa-sign-in-alt"></i>
                                                تسجيل دخول
                                            </a>
                                        </li>
                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <div class="">
            {{ $slot }}
        </div>

        {{-- Start Footer Section --}}
        <section class="footer">
            <div class="container">
                <div class="footer-content ptb-100">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="footer-logo-area">
                                <a href="index.html"><img src="{{ asset('images/logo.png') }}" width="100" alt="image"></a>
                                <p>نعمل على تسهيل التواصل بين المواطنين والبلديات لتقديم البلاغات، طلبات الرخص والتصاريح، ومتابعة أخبار بلديتك بسهولة</p>
                                <div class="footer-social-area">
                                    <ul>
                                        <li><span>تابعنا: </span></li>
                                        <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="footer-links footer-contact">
                                <h3>تواصل معنا</h3>
                                <div class="footer-contact-card">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <h5>الموقع: </h5>
                                    <p>
                                        <a href="">طرابلس - النوفليين</a>
                                    </p>
                                </div>
                                <div class="footer-contact-card">
                                    <i class="fas fa-envelope"></i>
                                    <h5>البريد الإلكتروني: </h5>
                                    <p>
                                        <a href="">contact@municipality-portal.com</a>
                                    </p>
                                </div>
                                <div class="footer-contact-card">
                                    <i class="fas fa-phone-alt"></i>
                                    <h5>الهاتف: </h5>
                                    <p><a href="tel:+13454567877">+218 91 0078033</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="footer-links footer-quick-links">
                                <h3>روابط سريعة</h3>
                                <ul>
                                    <li>
                                        <i class="fas fa-angle-right"></i>
                                        <a href="{{ route('home', getCurrentMunicipality()) }}">الصفحة الرئيسية</a>
                                    </li>
                                    <li>
                                        <i class="fas fa-angle-right"></i>
                                        <a href="{{ route('reports.index', getCurrentMunicipality()) }}">البلاغات</a>
                                    </li>
                                    <li>
                                        <i class="fas fa-angle-right"></i>
                                        <a href="{{ route('news.index', getCurrentMunicipality()) }}">الاخبار</a>
                                    </li>
                                    <li>
                                        <i class="fas fa-angle-right"></i>
                                        <a href="{{ route('services.index', getCurrentMunicipality()) }}">الخدمات</a>
                                    </li>
                                    <li>
                                        <i class="fas fa-angle-right"></i>
                                        <a href="{{ route('requests', getCurrentMunicipality()) }}">التراخيص والتصاريح</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        {{-- End Footer Section --}}


        <div class="go-top">
            <i class="fas fa-chevron-up"></i>
        </div>

        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src=" {{ asset('js/jquery.min.js') }}"></script>
        <script src=" {{ asset('js/jquery-ui.min.js') }}"></script>
        <script src=" {{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src=" {{ asset('js/meanmenu.js') }}"></script>
        <script src=" {{ asset('js/owl.carousel.min.js') }} "></script>
        <script src=" {{ asset('js/magnific-popup.min.js') }}"></script>
        <script src=" {{ asset('js/TweenMax.js') }}"></script>
        <script src=" {{ asset('js/form-validator.min.js') }} "></script>
        <script src=" {{ asset('js/contact-form-script.js') }}"></script>
        <script src=" {{ asset('js/ajaxchimp.min.js') }} "></script>
        <script src=" {{ asset('js/owl.carousel2.thumbs.min.js') }}"></script>
        <script src=" {{ asset('js/appear.min.js') }} "></script>
        <script src=" {{ asset('js/odometer.min.js') }} "></script>
        <script src=" {{ asset('js/custom.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @stack('scripts')
    </body>
</html>
