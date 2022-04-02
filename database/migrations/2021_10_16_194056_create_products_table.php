<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->json('note')->nullable();
            $table->text("discrip")->nullable();
            $table->float('price')->default(0);
            $table->json('colors')->nullable();
            $table->text("img")->nullable();
            $table->json("imgs")->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId("department_id")->nullable()->constrained("departments")->nullOnDelete();
            $table->foreignId('bussinse_id')->nullable()->constrained('bussinses')->cascadeOnUpdate()->nullOnDelete();
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
        Schema::dropIfExists('products');
    }
}
