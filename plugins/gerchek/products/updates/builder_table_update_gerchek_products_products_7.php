<?php namespace Gerchek\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateGerchekProductsProducts7 extends Migration
{
    public function up()
    {
        Schema::table('gerchek_products_products', function($table)
        {
            $table->string('best_before_date', 10)->nullable(false)->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('gerchek_products_products', function($table)
        {
            $table->smallInteger('best_before_date')->nullable(false)->unsigned(false)->default(null)->comment(null)->change();
        });
    }
}
