<?php namespace Gerchek\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateGerchekProductsOrders extends Migration
{
    public function up()
    {
        Schema::create('gerchek_products_orders', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('status');
            $table->integer('user_id');
            $table->integer('farmer_id');
            $table->bigInteger('price');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('gerchek_products_orders');
    }
}
