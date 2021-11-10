@extends('layouts.front')
@section('title','تماس با ما')
@section('content')
<section class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb d-flex justify-content-center">
                    <li><a href="{{url('/')}}">خانه</a></li>
                    <li class="active">تماس با ما</li>
                </ol>
                <h1 class="page-title text-dark text-xlarge text-bold text-center">تماس با ما</h1>
                <div class="line thin"></div>
                <div class="page-description">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 mt-5">
                            {!! setting('contact_us') !!}
                            <hr>
                            <h4 class="mb-5">راه های ارتباطی</h4>
                            <div class="single-contact-info d-flex align-items-center mb-3">
                                <div class="icon ml-2">
                                    <img src="{{url('front/images/map-pin.png')}}" alt="">
                                </div>
                                <p class="text-dark">{{setting('address')}}</p>
                            </div>
                            <div class="single-contact-info d-flex align-items-center mb-3">
                                <div class="icon ml-2">
                                    <img src="{{url('front/images/smartphone.png')}}" alt="">
                                </div>
                                <p class="text-dark">{{setting('phone')}}</p>
                            </div>
                            <div class="single-contact-info d-flex align-items-center mb-3">
                                <div class="icon ml-2">
                                    <img src="{{url('front/images/paper-plane.png')}}" alt="">
                                </div>
                                <p class="text-dark">{{setting('email')}}</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <form action="{{route('contact_us.store')}}" class="row contact" id="contact-form" method="POST">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>نام <span class="required"></span></label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ایمیل <span class="required"></span></label>
                                        <input type="text" class="form-control" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>موضوع </label>
                                        <input type="text" class="form-control" name="title" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>پیام شما <span class="required"></span></label>
                                        <textarea class="form-control" name="message" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary float-right">ارسال پیام</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection