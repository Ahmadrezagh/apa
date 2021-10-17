<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    public function newsLetter(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        if(Newsletter::hasMail($request->email))
        {
            toastr()->warning('این ایمیل قبلا در سامانه ثبت شده است');
        }else{
            Newsletter::create([
                'email' => $request->email
            ]);
            toastr()->success('شما با موفقیت عضو خبرنامه ما شدید');
        }
        return back();
    }
}
