<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->foreignId('street_id')->constrained();
            $table->unsignedInteger('member_number')->unique();
            $table->char('ktp_number', 16)->unique();
            $table->text('address');
            $table->string('password');
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
        Schema::dropIfExists('parkers');
    }
}
