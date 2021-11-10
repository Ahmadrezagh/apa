<!DOCTYPE html>
<html dir="rtl">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="قالب خبری Magz">
    <meta name="author" content="Kodinger">
    <meta name="keyword" content="مرکز آپا بوشهر">
    <!-- Shareable -->
    <meta property="og:title" content="مرکز آپا بوشهر" />
    <title>{{setting('name')}}</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{url('/front/scripts/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('/front/css/bootstrap-rtl.min.css')}}">
    <!-- Icons -->
    <link rel="stylesheet" href="{{url('/front/scripts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{url('/front/scripts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('/front/scripts/fontawesome-5.0.8/css/fontawesome-all.min.css')}}">
    <!-- Toast -->
    <link rel="stylesheet" href="{{url('/front/scripts/toast/jquery.toast.min.css')}}">
    <!-- OwlCarousel -->
    <link rel="stylesheet" href="{{url('/front/scripts/owlcarousel/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('/front/scripts/owlcarousel/dist/assets/owl.theme.default.min.css')}}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{url('/front/scripts/magnific-popup/dist/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('/front/scripts/sweetalert/dist/sweetalert.css')}}">
    <!-- Custom style -->
    <link rel="stylesheet" href="{{url('/front/css/style.css')}}">
    <link rel="stylesheet" href="{{url('/front/css/skins/all.css')}}">
    <link rel="stylesheet" href="{{url('/front/css/demo.css')}}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @toastr_css
    <link
            rel="stylesheet"
            href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />
</head>

<body class="skin-orange">
@include('sweet::alert')
<header class="primary">
    <div class="firstbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="brand">
                        <a href="{{url('/')}}">
                            <img src="{{url(setting('logo'))}}" alt="{{setting('name')}}" style="
    max-width: 85px;
">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <form class="search" action="{{route('posts')}}" autocomplete="off">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="q" value="{{request('q')}}" class="form-control"
                                       placeholder="جستجوی عبارت مورد نظر ...">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">
                                        <a class="ion-search text-white" ></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 text-right">
                    <ul class="nav-icons">
                        <li><a href="{{route('register')}}"><i class="ion-person-add"></i>
                                <div>ثبت نام</div>
                            </a></li>
                        <li><a href="{{route('login')}}"><i class="ion-person"></i>
                                <div>ورود</div>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Start nav -->
    <nav class="menu">
        <div class="container">
            <div class="brand">
                <a href="#">
                    <img src="{{url(setting('logo'))}}" alt="{{setting('name')}}" style=" width: auto;
    max-height: 50px;">
                </a>
            </div>
            <div class="mobile-toggle">
                <a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
            </div>
            <div class="mobile-toggle">
                <a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
            </div>
            <div id="menu-list">
                <ul class="nav-list">
                    <li class="for-tablet nav-title"><a>فهرست</a></li>
                    <li class="for-tablet"><a href="{{route('login')}}">ورود</a></li>
                    <li class="for-tablet"><a href="{{route('register')}}">ثبت نام</a></li>
                    <li><a href="{{url('/')}}">خانه</a></li>

                    <li class="dropdown magz-dropdown">
                        <a href="#">دسته بندی ها <i class="ion-ios-arrow-left"></i></a>
                        <ul class="dropdown-menu">
                            @foreach(\App\Models\Category::all() as $category)
                            <li><a href="{{route('category',$category->slug)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @foreach(\App\Models\PostType::all() as $item)
                    <li class="dropdown magz-dropdown magz-dropdown-megamenu">
                        <a href="#">{{$item->name}} <i
                                    class="ion-ios-arrow-left"></i>
                        </a>
                        <div class="dropdown-menu megamenu" >
                            <div class="megamenu-inner">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h2 class="megamenu-title"><a href="{{route('type.posts.index',$item->slug)}}">{{$item->name}}</a></h2>
                                            </div>
                                        </div>
                                        <ul class="vertical-menu">

                                            @foreach($item->posts()->latest()->take(4)->get() as $post)
                                            <li><a href="{{route('type.posts.show',[$item->slug,$post->slug])}}"><i class="ion-ios-circle-outline"></i>{{$post->title}}</a></li>
                                            @endforeach
                                                <li><a href="{{route('type.posts.index',[$item->slug])}}"><i class="ion-ios-circle-outline"></i>بیشتر...</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h2 class="megamenu-title">{{$item->name}} اخیر</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @foreach($item->posts()->latest()->take(3)->get() as $post)
                                            <article class="article col-lg-4 mini">
                                                <div class="inner">
                                                    <figure>
                                                        <a href="{{route('type.posts.show',[$item->slug,$post->slug])}}">
                                                            <img src="{{url($post->image)}}" alt="Sample Article">
                                                        </a>
                                                    </figure>
                                                    <div class="padding">
                                                        <div class="detail">
                                                            <div class="time">{{$post->date}}</div>
                                                            <div class="category"><a href="{{route('type.posts.index',$item->slug)}}">{{$item->title}}</a>
                                                            </div>
                                                        </div>
                                                        <h2><a href="{{route('type.posts.show',[$item->slug,$post->slug])}}">{{$post->title}}</a></h2>
                                                    </div>
                                                </div>
                                            </article>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </nav>
    <!-- End nav -->
</header>

@yield('content')
<!-- Start footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="block">
                    <h1 class="block-title">درباره ما</h1>
                    <div class="block-body">
                        <figure class="foot-logo">
                            <img src="{{url(setting('logo'))}}" class="img-responsive" alt="Logo">
                        </figure>
                        <a href="{{route('about_us')}}" class="btn btn-magz white"> درباره ما <i
                                    class="ion-ios-arrow-thin-left"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="block">
                    <h1 class="block-title">لینک های مرتبط <div class="left"><a href="#">مشاهده همه <i
                                        class="ion-ios-arrow-thin-left"></i></a></div>
                    </h1>
                    <div class="block-body">
                        <ul class="tags">

                        </ul>
                    </div>
                </div>
                <div class="line"></div>
                <div class="block">
                    <h1 class="block-title">خبرنامه</h1>
                    <div class="block-body">
                        <p>برای دریافت آخرین اخبار ایمیل خود را وارد کنید</p>
                        <form class="newsletter" action="{{route('newsLetter')}}" method="POST">
                            @csrf
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="ion-ios-email-outline"></i>
                                </div>
                                <input type="email" name="email" class="form-control email" placeholder="ایمیل شما">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block white">ثبت ایمیل</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="block">
                    <h1 class="block-title">آخرین خبر ها</h1>
                    <div class="block-body text-right">
                        @foreach( \App\Models\Post::query()->latest()->take(4)->get() as $item)
                        <article class="article-mini">
                            <div class="inner">
                                <figure>
                                    <a href="{{$item->link}}">
                                        <img src="{{url($item->image)}}" alt="Sample Article">
                                    </a>
                                </figure>
                                <div class="padding">
                                    <h1><a href="{{$item->link}}">{{$item->title}}</a>
                                    </h1>
                                </div>
                            </div>
                        </article>
                        @endforeach
                        <a href="{{url('/posts')}}" class="btn btn-magz white btn-block text-center">مشاهده همه <i
                                    class="ion-ios-arrow-thin-left"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6">
                <div class="block">
                    <h1 class="block-title">دنبال کردن</h1>
                    <div class="block-body">
                        <p>ما را در شبکه های اجتماعی دنبال کنید</p>
                        <ul class="social trp">
                            <li>
                                <a href="#" class="facebook">
                                    <svg>
                                        <rect width="0" height="0" /></svg>
                                    <i class="ion-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="twitter">
                                    <svg>
                                        <rect width="0" height="0" /></svg>
                                    <i class="ion-social-twitter-outline"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="youtube">
                                    <svg>
                                        <rect width="0" height="0" /></svg>
                                    <i class="ion-social-youtube-outline"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="googleplus">
                                    <svg>
                                        <rect width="0" height="0" /></svg>
                                    <i class="ion-social-googleplus"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="instagram">
                                    <svg>
                                        <rect width="0" height="0" /></svg>
                                    <i class="ion-social-instagram-outline"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="tumblr">
                                    <svg>
                                        <rect width="0" height="0" /></svg>
                                    <i class="ion-social-tumblr"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="dribbble">
                                    <svg>
                                        <rect width="0" height="0" /></svg>
                                    <i class="ion-social-dribbble"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="linkedin">
                                    <svg>
                                        <rect width="0" height="0" /></svg>
                                    <i class="ion-social-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="skype">
                                    <svg>
                                        <rect width="0" height="0" /></svg>
                                    <i class="ion-social-skype"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="rss">
                                    <svg>
                                        <rect width="0" height="0" /></svg>
                                    <i class="ion-social-rss"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="line"></div>
                <div class="block">
                    <div class="block-body no-margin">
                        <ul class="footer-nav-horizontal">
                            <li><a href="{{url('/')}}">خانه</a></li>
                            <li><a href="{{route('contact_us')}}">تماس با ما</a></li>
                            <li><a href="{{route('about_us')}}">در باره ما</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    طراحی و توسعه <a href="http://cert.pgu.ac.ir/">مرکز آپا خلیج فارس بوشهر</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->

<!-- JS -->
@jquery
@toastr_js
@toastr_render
<script src="{{url('/front/js/jquery.js')}}"></script>
<script src="{{url('/front/js/jquery.migrate.js')}}"></script>
<script src="{{url('/front/scripts/bootstrap/bootstrap.min.js')}}"></script>
<script>
    var $target_end = $(".best-of-the-week");
</script>
<script src="{{url('/front/scripts/jquery-number/jquery.number.min.js')}}"></script>
<script src="{{url('/front/scripts/owlcarousel/dist/owl.carousel.min.js')}}"></script>
<script src="{{url('/front/scripts/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('/front/scripts/easescroll/jquery.easeScroll.js')}}"></script>
<script src="{{url('/front/scripts/sweetalert/dist/sweetalert.min.js')}}"></script>
<script src="{{url('/front/scripts/toast/jquery.toast.min.js')}}"></script>
{{--<script src="{{url('/front/js/demo.js')}}"></script>--}}
<script src="{{url('/front/js/e-magz.js')}}"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>