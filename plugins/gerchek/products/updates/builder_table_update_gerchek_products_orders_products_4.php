<?php namespace Gerchek\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateGerchekProductsOrdersProducts4 extends Migration
{
    public function up()
    {
        Schema::table('gerchek_products_orders_products', function($table)
        {
            $table->bigInteger('quantity');
        });
    }
    
    public function down()
    {
        Schema::table('gerchek_products_orders_products', function($table)
        {
            $table->dropColumn('quantity');
        });
    }
}
