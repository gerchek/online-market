<?php namespace Gerchek\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateGerchekProductsProducts6 extends Migration
{
    public function up()
    {
        Schema::table('gerchek_products_products', function($table)
        {
            $table->string('storage_conditions');
            $table->smallInteger('best_before_date');
        });
    }
    
    public function down()
    {
        Schema::table('gerchek_products_products', function($table)
        {
            $table->dropColumn('storage_conditions');
            $table->dropColumn('best_before_date');
        });
    }
}
