<?php namespace Gerchek\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateGerchekProductsOrders9 extends Migration
{
    public function up()
    {
        Schema::table('gerchek_products_orders', function($table)
        {
            $table->text('phone');
            $table->text('comment');
            $table->renameColumn('someotherdata', 'delivery_time');
        });
    }
    
    public function down()
    {
        Schema::table('gerchek_products_orders', function($table)
        {
            $table->dropColumn('phone');
            $table->dropColumn('comment');
            $table->renameColumn('delivery_time', 'someotherdata');
        });
    }
}
