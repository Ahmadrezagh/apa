<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
    use HasFactory;
    protected $fillable = [
        'email'
    ];
    public static function hasMail($email)
    {
        if (Newsletter::where('email','=',$email)->first())
        {
            return true;
        }else{
            return false;
        }
    }
}
