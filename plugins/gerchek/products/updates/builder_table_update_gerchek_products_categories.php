<?php namespace Gerchek\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateGerchekProductsCategories extends Migration
{
    public function up()
    {
        Schema::table('gerchek_products_categories', function($table)
        {
            $table->integer('farmer_id');
        });
    }
    
    public function down()
    {
        Schema::table('gerchek_products_categories', function($table)
        {
            $table->dropColumn('farmer_id');
        });
    }
}
