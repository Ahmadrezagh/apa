<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>مدرک</title>
    <style>
        @font-face {
            font-family: 'IranNastaliq';
            src: url('/certificate/fonts/IranNastaliq.eot');
            src: url('/certificate/fonts/IranNastaliq.eot?#iefix') format('embedded-opentype'),
            url('/certificate/fonts/IranNastaliq.woff2') format('woff2'),
            url('/certificate/fonts/IranNastaliq.woff') format('woff'),
            url('/certificate/fonts/IranNastaliq.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "IranNastaliq";
        }


        @media print {
            @page {
                size: A4 landscape;
                margin: 0mm;
            }

            .p {
                display: none;
            }
        }

    </style>
</head>
<body style="display: flex;align-items: center;justify-content: center;width: 100vw;height: 100vh;direction: rtl">
<div style="height: 759px;width: 1030px;position: relative;flex-shrink: 0">
    <img src="/certificate/images/image001.jpg" alt="" style="height: 100%;width: 100%">
    <img src="{{$certificate->left_image}}" style="position: absolute;left: 150px;top: 120px;height: 90px;width: 100px">
    <img src="{{$certificate->right_image}}"
         style="position: absolute;right: 150px;top: 120px;height: 110px;width: 110px">
    <span style="position: absolute;top: 20px;font-size: 30px;left: 50%;transform: translateX(-50%);white-space: nowrap">
        {{toPersianNumber($certificate->big_title)}}
    </span>
    <span style="position: absolute;top: 110px;font-size: 30px;left: 50%;transform: translateX(-50%);white-space: nowrap">
        {{toPersianNumber($certificate->secondary_title)}}
    </span>
    <span style="position: absolute;top: 210px;font-size: 20px;left: 50%;transform: translateX(-50%);white-space: nowrap">
        {{toPersianNumber($certificate->title)}}
    </span>

    <span style="top: 330px;right: 100px;position: absolute;font-size: 20px">
        {!!  toPersianNumber($certificate->to)!!}
    </span>
    <span style="font-size: 20px;position: absolute;left: 130px;top: 240px">
        تاریخ صدور :
        {!!  toPersianNumber(\Morilog\Jalali\Jalalian::forge(strtotime($certificate->created_at))->format("Y/m/d")) !!}
    </span>
    <span style="top: 390px;right: 100px;position: absolute;font-size: 21px;width: 850px">
        {!! toPersianNumber($certificate->body) !!}
    </span>
    <p style="position: absolute;top: 580px;left: 200px;text-align: center;font-size: 18px">دکتر مهدی آزادی مطلق
        <br>
        رئیس مرکز تخصصی آپای دانشگاه خلیج فارس
    </p>

    <span style="position: absolute;top: 540px;right: 200px">
        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{url("certificates")."/".$certificate->certificate_id}}&choe=UTF-8"
             style="width: 150px;height: 150px">
    </span>
    <span style="position: absolute;bottom: 60px;right:190px;font-family: sans-serif;font-size: 12px;display: block;text-align: center;direction: ltr">
        {{url("certificates")."/".$certificate->certificate_id}}
    </span>
    <span style="position: absolute;bottom: 20px;right: 300px;font-family: sans-serif;font-size: 12px;display: block;text-align: center;direction: ltr">
        certificate ID: {{$certificate->certificate_id}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{url("certificates")}}
    </span>

</div>

<script>
    let printBtn = `<a class="p" href="#" style="position: absolute;left: 20px;bottom: 20px;" onclick="print()"><img style="height: 51.2px;width: 51.2px" src="/certificate/images/printer.png" alt=""></a>`;

    document.body.innerHTML = document.body.innerHTML + printBtn;

</script>
</body>
</html>