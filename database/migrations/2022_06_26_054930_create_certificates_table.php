<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string("big_title");
            $table->string("secondary_title");
            $table->string("title");
            $table->string("to");
            $table->text("body");
            $table->string("certificate_id")->unique();
            $table->string("left_image")->default("/certificate/images/leftLogo.jpg");
            $table->string("right_image")->default("/certificate/images/rightLogo.jpg");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
