<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ContactUsRequest;
use App\Models\ContactUsMessage;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('front.contact');
    }

    public function store(ContactUsRequest $request)
    {
        ContactUsMessage::query()->create($request->validated());
        alert()->success('پیام شما با موفقیت بدست ما رسید');
        return back();
    }
}
