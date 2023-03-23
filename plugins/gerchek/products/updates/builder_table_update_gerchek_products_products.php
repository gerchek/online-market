<?php namespace Gerchek\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateGerchekProductsProducts extends Migration
{
    public function up()
    {
        Schema::table('gerchek_products_products', function($table)
        {
            $table->integer('farmer');
            $table->integer('category');
            $table->dropColumn('farmer_id');
            $table->dropColumn('category_id');
        });
    }
    
    public function down()
    {
        Schema::table('gerchek_products_products', function($table)
        {
            $table->dropColumn('farmer');
            $table->dropColumn('category');
            $table->integer('farmer_id');
            $table->integer('category_id');
        });
    }
}
