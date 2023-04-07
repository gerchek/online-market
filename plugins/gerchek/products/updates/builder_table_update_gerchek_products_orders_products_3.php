<?php namespace Gerchek\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateGerchekProductsOrdersProducts3 extends Migration
{
    public function up()
    {
        Schema::table('gerchek_products_orders_products', function($table)
        {
            $table->integer('orders_id')->nullable()->change();
            $table->integer('products_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('gerchek_products_orders_products', function($table)
        {
            $table->integer('orders_id')->nullable(false)->change();
            $table->integer('products_id')->nullable(false)->change();
        });
    }
}
