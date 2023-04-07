<?php namespace Gerchek\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateGerchekProductsOrders extends Migration
{
    public function up()
    {
        Schema::table('gerchek_products_orders', function($table)
        {
            $table->integer('address_id');
        });
    }
    
    public function down()
    {
        Schema::table('gerchek_products_orders', function($table)
        {
            $table->dropColumn('address_id');
        });
    }
}
