@extends('layouts.front')
@section('content')
    <section class="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="justify-content-center d-flex text-center">
                        <a href="https://ncsc2021.cert.pgu.ac.ir" target="_blank">
                            <img src="{{url('events/3.JPG')}}" alt="">
                        </a>
                    </div>
                    <div class="line">
                        <div>آخرین مقالات</div>
                    </div>
                    <div class="row">
                        @foreach($latest_news as $item)
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row">
                                    <article class="article col-md-12">
                                        <div class="inner my-1">
                                            <figure>
                                                <a href="{{$item->link}}">
                                                    <img src="{{url($item->image)}}" alt="{{$item->title}}" style="width: 350px;height: 250px">
                                                </a>
                                            </figure>
                                            <div class="padding pt-3">
                                                <div class="detail text-right">
                                                    <div class="time">{{$item->date}} <i
                                                                class="fa fa-clock float-right ml-2 mt-0-5"></i>
                                                    </div>
                                                    <div class="category"><a href="{{$item->type->link}}">{{$item->type->name ?? ' - '}}</a></div>
                                                </div>
                                                <h2><a href="{{$item->link}}">{{$item->title}}</a></h2>
                                                <p>{!! \Illuminate\Support\Str::limit($item->text,100) !!}</p>
                                                <footer>
                                                    <a class="btn btn-primary more" href="{{$item->link}}">
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
                            <h1 class="title-col">برچسب های تصادفی</h1>
                            <div class="body-col">
                                <ol class="tags-list">
                                    @foreach($tags as $tag)
                                    <li><a href="{{$tag->link}}">{{$tag->name}}</a></li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <h1 class="title-col">
                                مقالات روز
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
                                <article class="article-mini text-right">
                                    <div class="inner">
                                        <figure>
                                            <a href="{{$item->link}}">
                                                <img src="{{url($item->image)}}" alt="{{$item->title}}" style="width: 80px;height: 57px">
                                            </a>
                                        </figure>
                                        <div class="padding">
                                            <h1><a href="{{$item->link}}">{{$item->title}}</a></h1>
                                            <div class="detail">
                                                <div class="category"><a href="{{$item->type->link ?? ' - '}}">{{$item->type->name ?? ' - '}}</a></div>
                                                <div class="time">{{$item->date}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="line top">
                        <div>پربازدیدترین مقالات</div>
                    </div>
                    <div class="row">
                        @foreach($favorite_posts as $item)
                        <article class="col-md-12 article-list">
                            <div class="inner">
                                <figure>
                                    <a href="{{$item->link}}">
                                        <img src="{{url($item->image)}}" alt="{{$item->title}}" style="width: 350px;height: 250px">
                                    </a>
                                </figure>
                                <div class="details">
                                    <div class="detail">
                                        <div class="category">
                                            <a href="{{$item->link}}">{{$item->title}}</a>
                                        </div>
                                        <div class="time">{{$item->date}}</div>
                                    </div>
                                    <h1><a href="{{$item->link}}">{{$item->title}}</a>
                                    </h1>
                                    <p>
                                        {!! \Illuminate\Support\Str::limit($randomItem->posts()->latest()->first()->text,100) !!}
                                    </p>
                                    <footer>
                                        <a class="btn btn-primary more" href="{{$item->link}}">
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
                    <aside >
                        <h1 class="aside-title">{{$randomItem->name}} جدید</h1>
                        <div class="aside-body">
                            <article class="article-fw">
                                <div class="inner">
                                    <figure>
                                        <a href="{{route('type.posts.show',[$randomItem->slug,$randomItem->posts()->latest()->first()->slug])}}">
                                            <img src="{{url($randomItem->posts()->latest()->first()->image)}}">
                                        </a>
                                    </figure>
                                    <div class="details">
                                        <h1><a href="{{route('type.posts.show',[$randomItem->slug,$randomItem->posts()->latest()->first()->slug])}}">{{$randomItem->posts()->latest()->first()->title}}</a>
                                        </h1>
                                        <p>
                                            {!! \Illuminate\Support\Str::limit($randomItem->posts()->latest()->first()->text,100) !!}
                                        </p>
                                        <div class="detail">
                                            <div class="time">{{$randomItem->posts()->latest()->first()->date}}</div>
                                            <div class="category"><a href="{{route('type.posts.index',$randomItem->slug)}}">{{$randomItem->name}}</a></div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <div class="line"></div>
                            @foreach($randomItem->posts()->latest()->take(3)->get() as $ri)
                                <article class="article-mini text-right">
                                    <div class="inner">
                                        <figure>
                                            <a href="{{$ri->link}}">
                                                <img src="{{url($ri->image)}}">
                                            </a>
                                        </figure>
                                        <div class="padding">
                                            <h1><a href="{{$ri->link}}">{{$ri->title}}</a>
                                            </h1>
                                            <div class="detail">
                                                <div class="category"><a href="{{route('type.posts.index',$ri->type->slug)}}">{{$ri->type->name}}</a></div>
                                                <div class="time">{{$ri->date}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </aside>
                    <aside>
                        <div class="aside-body">
                            <form class="newsletter" action="{{route('newsLetter')}}" method="post">
                                @csrf
                                <div class="icon">
                                    <i class="ion-ios-email-outline"></i>
                                    <h1 class="text-center">خبرنامه</h1>
                                </div>
                                <div class="input-group">
                                    <input name="email" type="email" class="form-control email" placeholder="ایمیل شما">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="ion-paper-airplane mr-0"></i></button>
                                    </div>
                                </div>
                                <p>برای دریافت آخرین اخبار، ایمیل خود را وارد کنید</p>
                            </form>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

@endsection