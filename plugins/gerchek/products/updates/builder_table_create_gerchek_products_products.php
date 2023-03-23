<?php namespace Gerchek\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateGerchekProductsProducts extends Migration
{
    public function up()
    {
        Schema::create('gerchek_products_products', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->boolean('on_discount')->nullable();
            $table->boolean('fresh')->nullable();
            $table->text('description')->nullable();
            $table->text('compound')->nullable();
            $table->text('manufacture')->nullable();
            $table->integer('price')->nullable();
            $table->integer('discount')->nullable();
            $table->text('name')->nullable();
            $table->integer('farmer_id');
            $table->integer('category_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('gerchek_products_products');
    }
}
