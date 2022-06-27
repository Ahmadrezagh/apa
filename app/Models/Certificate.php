<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;


    protected $fillable = [
        "big_title",
        "secondary_title",
        "title",
        "to",
        "body",
        "certificate_id",
        "left_image",
        "right_image"
    ];

}
