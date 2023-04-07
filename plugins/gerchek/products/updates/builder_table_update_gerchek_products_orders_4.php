<?php namespace Gerchek\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateGerchekProductsOrders4 extends Migration
{
    public function up()
    {
        Schema::table('gerchek_products_orders', function($table)
        {
            $table->text('products');
        });
    }
    
    public function down()
    {
        Schema::table('gerchek_products_orders', function($table)
        {
            $table->dropColumn('products');
        });
    }
}
