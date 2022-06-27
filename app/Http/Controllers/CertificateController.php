<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function search()
    {
        return view("certificate.search");
    }


    public function find(Request $request, $certificateID)
    {
        $certificate = Certificate::query()->where("certificate_id", $certificateID)->first();
        if (!$certificate) {
            return redirect()->route("searchCertificate")->with("خطا", "گواهی پیدا نشد.");
        }


    }


}
