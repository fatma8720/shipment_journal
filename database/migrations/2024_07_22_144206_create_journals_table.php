<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalsTable extends Migration
{
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipment_id') 
                  ->references('id')
                  ->on('shipments') 
                  ->onDelete('cascade');
            $table->float('amount');
            $table->enum('type', ['Debit Cash', 'Credit Revenue', 'Credit Payable']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('journals');
    }
};
