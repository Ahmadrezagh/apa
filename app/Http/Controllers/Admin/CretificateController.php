<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Certificate\CertificateRequest;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CretificateController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->isSuperAdmin()) {
                return $next($request);
            } else {
                abort(404);
            }
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = Certificate::all();
        return view("admin.certificate.index",compact("certificates"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CertificateRequest $request)
    {
        $userValidData = $request->validated();
        if (isset($userValidData["left_image"])) {
            $userValidData["left_image"] = upload_file($userValidData["left_image"], "/certificates", Str::random(10) . time());
        }
        if (isset($userValidData["right_image"])) {
            $userValidData["right_image"] = upload_file($userValidData["right_image"], "/certificates", Str::random(10) . time());
        }
        $certId = Str::random(8);
        if (Certificate::query()->where("certificate_id", $certId)->first()) {
            alert()->error("خطا ناشناخته سرور دوباره امتحان کنید.");
            return back();
        }
        $userValidData["certificate_id"] = $certId;
        Certificate::query()->create($userValidData);
        alert()->success('گواهی ایجاد شد');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CertificateRequest $request, Certificate $certificate)
    {
        $userValidData = $request->validated();
        if (isset($userValidData["left_image"])) {
            $userValidData["left_image"] = upload_file($userValidData["left_image"], "/certificates", Str::random(10) . time());
        }
        if (isset($userValidData["right_image"])) {
            $userValidData["right_image"] = upload_file($userValidData["right_image"], "/certificates", Str::random(10) . time());
        }
        $certificate->update($userValidData);
        alert()->success('گواهی ویرایش شد');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        alert()->success('گواهی پاک شد');
        return back();
    }
}
