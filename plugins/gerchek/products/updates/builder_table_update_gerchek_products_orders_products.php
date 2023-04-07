<?php namespace Gerchek\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateGerchekProductsOrdersProducts extends Migration
{
    public function up()
    {
        Schema::table('gerchek_products_orders_products', function($table)
        {
            $table->renameColumn('order_id', 'orders_id');
        });
    }
    
    public function down()
    {
        Schema::table('gerchek_products_orders_products', function($table)
        {
            $table->renameColumn('orders_id', 'order_id');
        });
    }
}
