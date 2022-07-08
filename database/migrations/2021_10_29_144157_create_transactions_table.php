<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parker_id')->constrained();
            $table->foreignId('vehicle_id')->constrained();
            $table->string('license_plate', 8);
            $table->timestamp('in_time');
            $table->timestamp('out_time')->nullable();
            $table->unsignedInteger('total_price')->nullable();
            $table->enum('status', ['in', 'out']);
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
        Schema::dropIfExists('transactions');
    }
}
