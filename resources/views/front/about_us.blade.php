@extends('layouts.front')
@section('title','درباره ما')
@section('content')
<section class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb d-flex justify-content-center">
                    <li><a href="{{url('/')}}">خانه</a></li>
                    <li class="active">درباره ما</li>
                </ol>
                <h1 class="page-title text-center">درباره ما</h1>
                <div class="line thin"></div>
                <div class="page-description">

                    {!! setting('about_us') !!}

                    <div class="question">
                        سوالی دارید ؟ <a href="{{route('contact_us')}}" class="btn btn-primary">تماس با ما</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
