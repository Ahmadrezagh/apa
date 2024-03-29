@extends('layouts.front')
@section('title',$post->title)
@section('content')
    <section class="single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">خانه</a></li>
                        <li><a href="{{route('type.posts.index',$type->slug)}}">{{$type->name}}</a></li>
                        <li class="active font-fam">{{$post->title}}</li>
                    </ol>
                    <article class="article main-article mt-5">
                        <header>
                            <h3 class="pt-0">{{$post->title}}</h3>
                            <ul class="details">
                                <li>{{$post->date}}</li>
                                <li><a>{{$post->type->name}}</a></li>
                                <li class="font-fam"><a>{{$post->view}} بازدید</a></li>
                            </ul>
                        </header>
                        <div class="main">
                            <div class="featured mb-5">
                                <figure>
                                   @if($post->image) <img src="{{url($post->image)}}"> @endif
                                </figure>
                            </div>
                            <div class="text-right">
                                {!! $post->text !!}
                            </div>
                        </div>
                        <footer>
                            <div class="col d-inline-block pr-0 mb-5">
                                <ul class="tags">
                                    @foreach($post->tags as $tag)
                                    <li><a href="{{route('tag',$tag->name)}}">{{$tag->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col d-inline-block">
                                <a href="#" class="love"><i class="ion-android-favorite-outline"></i>
                                    <div>2,347</div>
                                </a>
                            </div>
                        </footer>
                    </article>

                    <div class="sharing " style="float: right">
                        <div class="title"><i class="ion-android-share-alt"></i> به اشتراک گذاری این خبر</div>
                        <ul class="social">
                            <li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=#{{$post->link}}" target="_blank" class="facebook">
                                    <i class="ion-social-facebook"></i> Facebook
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/intent/tweet?url={{$post->link}}" target="_blank" class="twitter">
                                    <i class="ion-social-twitter"></i> Twitter
                                </a>
                            </li>
                            <li>
                                <a href="https://plus.google.com/share?url={{$post->link}}" class="googleplus">
                                    <i class="ion-social-googleplus"></i> Google+
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{$post->link}}&title={{$post->title}}" class="linkedin">
                                    <i class="ion-social-linkedin"></i> Linkedin
                                </a>
                            </li>
                            <li>
                                <a href="mailto:?subject={{$post->title}}&amp;body=Check out this site {{$post->link}}" class="skype">
                                    <i class="ion-ios-email-outline"></i> Email
                                </a>
                            </li>
                            <li class="count">
{{--                                ۲۰--}}
{{--                                <div>اشتراک گذاری</div>--}}
                            </li>
                        </ul>
                    </div>

                    <div class="line">
                        <div>مطالب مرتبط</div>
                    </div>

                    <div class="row">
                        @foreach($post->similarItems() as $item)
                        <article class="article related col-md-6 col-sm-6 col-xs-12">
                            <div class="inner">
                                <figure>
                                    <a href="{{$item->link}}">
                                        <img src="{{url($item->image)}}">
                                    </a>
                                </figure>
                                <div class="padding">
                                    <h2><a href="{{url($item->image)}}">{{$item->title}}</a></h2>
                                    <div class="detail text-right mt-4">
                                        <div class="category"><a href="{{$item->type->link}}">{{$item->type->name}}</a></div>
                                        <div class="time"><i class="fa fa-clock"></i> {{$item->date}} </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection