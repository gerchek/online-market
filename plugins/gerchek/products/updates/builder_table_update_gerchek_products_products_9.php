<?php namespace Gerchek\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateGerchekProductsProducts9 extends Migration
{
    public function up()
    {
        Schema::table('gerchek_products_products', function($table)
        {
            $table->smallInteger('package');
        });
    }
    
    public function down()
    {
        Schema::table('gerchek_products_products', function($table)
        {
            $table->dropColumn('package');
        });
    }
}
