<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_confirms', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('fname');
            $table->string('lname');
            $table->string('address');
            $table->string('image');
            $table->string('date');
            $table->string('time');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('pay_confirms');
    }
};
