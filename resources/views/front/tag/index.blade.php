@extends('layouts.front')
@section('content')
<section class="category">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 text-left">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="{{url('/')}}">تگ</a></li>
                            <li class="active">{{$tag->name}}</li>
                        </ol>
                        <h1 class="page-title mt-3">{{$tag->name}}</h1>
                    </div>
                </div>
                <div class="line mt-1"></div>
                <div class="row">
                    @foreach($posts as $post)
                    <article class="col-md-12 article-list">
                        <div class="inner">
                            <figure>
                                <a href="{{route('type.posts.show',[$post->type->slug,$post->slug])}}">
                                    <img src="{{url($post->image)}}" alt="{{$post->title}}">
                                </a>
                            </figure>
                            <div class="details">
                                <div class="detail text-right d-flex">
                                    <div class="category">
                                        @if($post->type) <a href="{{route('type.posts.index',$post->type->slug)}}">{{$post->type->name}}</a> @endif
                                    </div>
                                    <div class="time"><i class="fa fa-clock"></i>{{$post->date}}</div>
                                </div>
                                <h1 class="pt-0"><a href="{{route('type.posts.show',[$post->type->slug,$post->slug])}}">{{$post->title}}</a></h1>
                                <p>
                                    {{\Illuminate\Support\Str::limit($post->text,100)}}
                                </p>
                                <footer class="mt-2">
                                    <a class="btn btn-primary more" href="{{route('type.posts.show',[$post->type->slug,$post->slug])}}">
                                        <div>بیشتر</div>
                                        <div><i class="ion-ios-arrow-thin-left"></i></div>
                                    </a>
                                </footer>
                            </div>
                        </div>
                    </article>
                    @endforeach
                    <div class="col-md-12 text-center d-flex justify-content-center">
                        <ul class="pagination">
                            <li class="prev"><a href="{{$posts->previousPageUrl()}}"><i class="ion-ios-arrow-right"></i></a></li>
                            @for($i=1;$i<=$posts->lastPage();$i++)
                            <li @if($posts->currentPage() == $i) class="active" @endif ><a href="{{$posts->url($i)}}">{{$i}}</a></li>
                            @endfor
                            <li class="next"><a href="{{$posts->nextPageUrl()}}"><i class="ion-ios-arrow-left"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 sidebar">

                <aside>
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
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم لورم ایپسوم متن ساختگی با
                                        تولید سادگی نامفهوملورم ایپسوم متن ساختگی با تولید سادگی نامفهوم.
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
                        <article class="article-mini">
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
            </div>
        </div>
    </div>
</section>
@endsection
