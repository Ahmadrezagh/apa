<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function search(Request $request)
    {
        if ($request->get("to", false)) {
            return redirect()->route("showCertificate", ["certificateID" => $request->get("to", false)]);
        }
        return view("certificate.search");
    }


    public function find(Request $request, $certificateID)
    {
        $certificate = Certificate::query()->where("certificate_id", $certificateID)->first();
        if (!$certificate) {
            return redirect()->route("searchCertificate")->withErrors(["گواهی پیدا نشد."]);
        }

        return view("certificate.view", compact("certificate"));

    }


}
