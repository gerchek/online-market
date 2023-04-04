<?php namespace Gerchek\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateGerchekProductsAddresses extends Migration
{
    public function up()
    {
        Schema::table('gerchek_products_addresses', function($table)
        {
            $table->integer('user_id');
        });
    }
    
    public function down()
    {
        Schema::table('gerchek_products_addresses', function($table)
        {
            $table->dropColumn('user_id');
        });
    }
}
