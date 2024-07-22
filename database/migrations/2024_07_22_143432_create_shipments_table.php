<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('shipper');
            $table->string('image');
            $table->float('weight');
            $table->text('description');
            $table->float('price');
            $table->enum('status', ['Pending', 'Progress', 'Done'])->default('Pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shipments');
    }
}
