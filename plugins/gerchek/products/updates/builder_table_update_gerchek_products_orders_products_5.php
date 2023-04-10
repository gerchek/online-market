<?php namespace Gerchek\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateGerchekProductsOrdersProducts5 extends Migration
{
    public function up()
    {
        Schema::table('gerchek_products_orders_products', function($table)
        {
            $table->bigInteger('quantity')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('gerchek_products_orders_products', function($table)
        {
            $table->bigInteger('quantity')->nullable(false)->change();
        });
    }
}
