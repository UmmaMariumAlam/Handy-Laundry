<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('Orders','order_id')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('customers','customer_id')->onDelete('cascade');
            $table->foreignId('laundry_id')->constrained('laundromats','laundromat_id')->onDelete('cascade');
            $table->string('payment_method', 15);
            $table->float('total_price');
            $table->enum('status', ['unpaid', 'paid'])->default('unpaid');
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
        Schema::dropIfExists('bills');
    }

    
}
