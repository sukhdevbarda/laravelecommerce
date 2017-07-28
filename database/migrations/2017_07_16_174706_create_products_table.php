<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');            
             $table->integer('cat_id')->unsigned();            
             $table->integer('sub_cat_id')->unsigned();            
            $table->foreign('cat_id')
            ->references('id')->on('categories')
            ->onDelete('cascade');
            $table->foreign('sub_cat_id')
            ->references('id')->on('subCategories')
            ->onDelete('cascade');   
            $table->rememberToken();
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
        //
    }
}
