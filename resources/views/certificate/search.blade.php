<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/certificate/css/main.css">
    <link rel="stylesheet" href="/certificate/css/toastr.min.css">
    <title>سامانه استعلام گواهی مرکز تخصصی آپای دانشگاه خلیج فارس</title>
</head>
<body>
<div class="container open" id="main-container">
    <div class="wrapper">
        <h1>سامانه استعلام گواهی مرکز تخصصی آپای دانشگاه خلیج فارس</h1>
        <div class="input-group">
            <input placeholder="کد گواهی" type="text" class="text-input" required>
            <button class="btn btn-orange" id="btn">استعلام</button>
        </div>
        <p class="link-helpful">
            لینک های مفید
        </p>
        <div class="btn-box">
            <a href="https://pgu.ac.ir" target="_blank">دانشگاه خلیج فارس</a>
            <a href="https://cert.pgu.ac.ir" target="_blank">مرکز آپای دانشگاه خلیج فارس</a>
            <a href="https://erp.pgu.ac.ir" target="_blank">سامانه سادا</a>
            <a href="https://learning.cert.pgu.ac.ir">سایت آموزش مرکز آپای دانشگاه خلیج فارس</a>
        </div>
        <p class="tips">*: برای پرینت گواهی در صفحه نمایش گواهی با کلید ترکیبی ctrl + p میتوانید مدرک را پرینت بگیرید و یا نسخه PDF آن را ذخیره کنید.
            <br>
            برای نمایش صحیح گواهی در مرحله print از منو layout گزینه landscape انتخاب کنید و more setting گزینه Margins را روی None قرار دهید.
        </p>
    </div>
</div>
<script src="{{URL::to('/').'/plugins/jquery/jquery.min.js'}}"></script>
<script src="/certificate/js/toastr.min.js"></script>
@foreach ($errors->all() as $error)
    <script>
        toastr.error('{{$error}}')
    </script>
@endforeach
</body>
</html>