@extends('layouts.front')
@section('content')
    <section class="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="owl-carousel owl-theme slide" id="featured">
                        @foreach($slides as $slide)
                        <div class="item">
                            <article class="featured">
                                <div class="overlay"></div>
                                <figure>
                                    <img src="{{url($slide->image)}}" alt="Sample Article">
                                </figure>
                                <div class="details">
                                    @if($slide->type) <div class="category"><a href="#">{{$slide->type->name}}</a></div> @endif
                                    <h1><a href="#">{{$slide->title}}</a></h1>
                                    <div class="time">۲۶ اسفند ۱۳۹۸</div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                    <div class="line">
                        <div>آخرین اخبار</div>
                    </div>
                    <div class="row">
                        @foreach($latest_news as $item)
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row">
                                    <article class="article col-md-12">
                                        <div class="inner my-1">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{url($item->image)}}" alt="Sample Article">
                                                </a>
                                            </figure>
                                            <div class="padding pt-3">
                                                <div class="detail text-right">
                                                    <div class="time">اسفند ۹۸ <i
                                                                class="fa fa-clock float-right ml-2 mt-0-5"></i>
                                                    </div>
                                                    <div class="category"><a href="category.html">سلامت</a></div>
                                                </div>
                                                <h2><a href="single-post.html">لورم ایپسوم متن ساختگی با تولید سادگی
                                                        نامفهوم</a></h2>
                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با
                                                    تولید سادگی نامفهوملورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                                                <footer>
                                                    <a class="love" href="#"><i class="ion-android-favorite-outline"></i>
                                                        <div>۳۲۷</div>
                                                    </a>
                                                    <a class="btn btn-primary more" href="single-post.html">
                                                        <div>بیشتر</div>
                                                        <div><i class="ion-ios-arrow-thin-left"></i></div>
                                                    </a>
                                                </footer>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="line transparent little"></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 trending-tags">
                            <h1 class="title-col">برچسب های برتر</h1>
                            <div class="body-col">
                                <ol class="tags-list">
                                    <li><a href="#">کرونا</a></li>
                                    <li><a href="#">قیمت ارز</a></li>
                                    <li><a href="#">دربی پایتخت</a></li>
                                    <li><a href="#">واژگونی اتوبوس</a></li>
                                    <li><a href="#">سامسونگ</a></li>
                                    <li><a href="#">بازی جدید</a></li>
                                    <li><a href="#">جشنواره فجر</a></li>
                                    <li><a href="#">قیمت سکه</a></li>
                                    <li><a href="#">برجام</a></li>
                                    <li><a href="#">جام جهانی 2022</a></li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <h1 class="title-col">
                                اخبار داغ
                                <div class="carousel-nav" id="hot-news-nav">
                                    <div class="prev">
                                        <i class="ion-ios-arrow-left"></i>
                                    </div>
                                    <div class="next">
                                        <i class="ion-ios-arrow-right"></i>
                                    </div>
                                </div>
                            </h1>
                            <div class="body-col vertical-slider" data-max="4" data-nav="#hot-news-nav"
                                 data-item="article">
                                @foreach($most_view as $item)
                                <article class="article-mini">
                                    <div class="inner">
                                        <figure>
                                            <a href="single-post.html">
                                                <img src="{{url($item->image)}}" alt="Sample Article">
                                            </a>
                                        </figure>
                                        <div class="padding">
                                            <h1><a href="single-post.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </a></h1>
                                            <div class="detail">
                                                <div class="category"><a href="category.html">سلامت</a></div>
                                                <div class="time">12 اردیبهشت ۱۳۹۹</div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="line top">
                        <div>برترین اخبار</div>
                    </div>
                    <div class="row">
                        @foreach($favorite_posts as $item)
                        <article class="col-md-12 article-list">
                            <div class="inner">
                                <figure>
                                    <a href="single-post.html">
                                        <img src="{{url($item->image)}}" alt="Sample Article">
                                    </a>
                                </figure>
                                <div class="details">
                                    <div class="detail">
                                        <div class="category">
                                            <a href="#">فیلم و سینما</a>
                                        </div>
                                        <div class="time">20 اسفند ۱۳۹۸</div>
                                    </div>
                                    <h1><a href="single-post.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</a>
                                    </h1>
                                    <p>
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید
                                        سادگی نامفهوم لورم ایپسوم متن ساختگی با تولید سادگی نامفهوملورم ایپسوم متن
                                        ساختگی با تولید سادگی نامفهوم .
                                    </p>
                                    <footer>
                                        <a href="#" class="love"><i class="ion-android-favorite-outline"></i>
                                            <div>۲۷۳</div>
                                        </a>
                                        <a class="btn btn-primary more" href="single-post.html">
                                            <div>بیشتر</div>
                                            <div><i class="ion-ios-arrow-thin-left"></i></div>
                                        </a>
                                    </footer>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-6 col-md-4 sidebar" id="sidebar">
                    <div class="sidebar-title for-tablet">سایدبار</div>
                    <aside class="mt-3">
                        <h1 class="aside-title">محبوب ترین اخبار <a href="#" class="all">مشاهده همه <i
                                        class="ion-ios-arrow-left"></i></a></h1>
                        <div class="aside-body">
                            @foreach($favorite_posts as $item)
                            <article class="article-mini">
                                <div class="inner">
                                    <figure>
                                        <a href="single-post.html">
                                            <img src="{{url($item->image)}}" alt="Sample Article">
                                        </a>
                                    </figure>
                                    <div class="padding">
                                        <h1><a href="#">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</a>
                                        </h1>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </aside>
                    <aside>
                        <div class="aside-body">
                            <form class="newsletter">
                                <div class="icon">
                                    <i class="ion-ios-email-outline"></i>
                                    <h1 class="text-center">خبرنامه</h1>
                                </div>
                                <div class="input-group">
                                    <input type="email" class="form-control email" placeholder="ایمیل شما">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="ion-paper-airplane mr-0"></i></button>
                                    </div>
                                </div>
                                <p>برای دریافت آخرین اخبار، ایمیل خود را وارد کنید</p>
                            </form>
                        </div>
                    </aside>
                    <aside class="mt-4">
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li class="active">
                                <a href="#recomended" aria-controls="recomended" role="tab" data-toggle="tab">
                                    <i class="ion-android-star-outline"></i> پردیدگاه ترین اخبار
                                </a>
                            </li>
                            <li>
                                <a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">
                                    <i class="ion-ios-chatboxes-outline"></i> نظرات کاربران
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="recomended">
                                <article class="article-fw">
                                    <div class="inner">
                                        <figure>
                                            <a href="single-post.html">
                                                <img src="/front/images/news/img16.jpg" alt="Sample Article">
                                            </a>
                                        </figure>
                                        <div class="details">
                                            <div class="detail">
                                                <div class="time">۲۸ اسفند ۱۳۹۸</div>
                                                <div class="category"><a href="category.html">ورزشی</a></div>
                                            </div>
                                            <h1><a href="single-post.html">لورم ایپسوم متن ساختگی با تولید سادگی
                                                    نامفهوم</a>
                                            </h1>
                                            <p>
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با
                                                تولید سادگی نامفهوم
                                            </p>
                                        </div>
                                    </div>
                                </article>
                                <div class="line"></div>
                                @foreach($most_comment as $item)
                                <article class="article-mini">
                                    <div class="inner">
                                        <figure>
                                            <a href="single-post.html">
                                                <img src="{{url($item->image)}}" alt="Sample Article">
                                            </a>
                                        </figure>
                                        <div class="padding">
                                            <h1><a href="single-post.html">لورم ایپسوم متن ساختگی با تولید سادگی
                                                    نامفهوم</a>
                                            </h1>
                                            <div class="detail">
                                                <div class="category"><a href="category.html">سلامت</a></div>
                                                <div class="time">۶ فروردین ۱۳۹۹</div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                @endforeach
                            </div>
                            <div class="tab-pane comments" id="comments">
                                <div class="comment-list sm">
                                    <div class="item">
                                        <div class="user">
                                            <figure>
                                                <img src="/front/images/img01.jpg" alt="User Picture">
                                            </figure>
                                            <div class="details">
                                                <h5 class="name">کاربر ۱</h5>
                                                <div class="time">۱۲ ساعت قبل</div>
                                                <div class="description">
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="user">
                                            <figure>
                                                <img src="/front/images/img01.jpg" alt="User Picture">
                                            </figure>
                                            <div class="details">
                                                <h5 class="name">کاربر ۲</h5>
                                                <div class="time">۱۶ ساعت قبل</div>
                                                <div class="description">
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="user">
                                            <figure>
                                                <img src="/front/images/img01.jpg" alt="User Picture">
                                            </figure>
                                            <div class="details">
                                                <h5 class="name">کاربر ۳</h5>
                                                <div class="time">۱۷ ساعت قبل</div>
                                                <div class="description">
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <aside id="sponsored">
                        <h1 class="aside-title">اسپانسر ها</h1>
                        <div class="aside-body">
                            <ul class="sponsored">
                                @foreach($sponsers as $item)
                                <li>
                                    <a href="#">
                                        <img src="{{url($item->image)}}" alt="Sponsored">
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

    <section class="best-of-the-week">
        <div class="container">
            <h1>
                <div class="text">برترین اخبار هفته گذشته</div>
                <div class="carousel-nav" id="best-of-the-week-nav">
                    <div class="prev">
                        <i class="ion-ios-arrow-left"></i>
                    </div>
                    <div class="next">
                        <i class="ion-ios-arrow-right"></i>
                    </div>
                </div>
            </h1>
            <div class="owl-carousel owl-theme carousel-1">
                @foreach($bestOfWeek as $item)
                <article class="article">
                    <div class="inner">
                        <figure>
                            <a href="single-post.html">
                                <img src="{{url($item->image)}}" alt="Sample Article">
                            </a>
                        </figure>
                        <div class="padding">
                            <div class="detail">
                                <div class="time">۱۱ فروردین ۱۳۹۹</div>
                                <div class="category"><a href="category.html">گردشگری</a></div>
                            </div>
                            <h2><a href="single-post.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</a></h2>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</p>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection