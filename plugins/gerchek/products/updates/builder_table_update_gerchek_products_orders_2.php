<?php namespace Gerchek\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateGerchekProductsOrders2 extends Migration
{
    public function up()
    {
        Schema::table('gerchek_products_orders', function($table)
        {
            $table->text('someotherdata');
        });
    }
    
    public function down()
    {
        Schema::table('gerchek_products_orders', function($table)
        {
            $table->dropColumn('someotherdata');
        });
    }
}
