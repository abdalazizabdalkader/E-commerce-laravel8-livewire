<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->decimal('subtotal');
            $table->decimal('total');
<<<<<<< HEAD
              $table->decimal('tax');
=======
            $table->decimal('tax');
>>>>>>> 4b55769b9f8144b16b37cb50a637b82e1ac2f3ab
            $table->decimal('discount')->default(0);
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile');
            $table->string('email');
            $table->string('line1');
            $table->string('line2')->nullable();
            $table->string('city');
            $table->string('country');
            $table->string('province');
            $table->string('zipcode');
<<<<<<< HEAD
             $table->enum('status',['ordered', 'delivered', 'canseled'])->default('ordered');
=======
            $table->enum('status',['ordered', 'delivered', 'canseled'])->default('ordered');
>>>>>>> 4b55769b9f8144b16b37cb50a637b82e1ac2f3ab
            $table->boolean('is_shipping_different')->default(false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
