<?php namespace Gerchek\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateGerchekProductsOrdersProducts2 extends Migration
{
    public function up()
    {
        Schema::table('gerchek_products_orders_products', function($table)
        {
            $table->renameColumn('product_id', 'products_id');
        });
    }
    
    public function down()
    {
        Schema::table('gerchek_products_orders_products', function($table)
        {
            $table->renameColumn('products_id', 'product_id');
        });
    }
}
