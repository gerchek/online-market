<?php namespace Gerchek\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateGerchekProductsProducts10 extends Migration
{
    public function up()
    {
        Schema::table('gerchek_products_products', function($table)
        {
            $table->text('package')->nullable(false)->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('gerchek_products_products', function($table)
        {
            $table->smallInteger('package')->nullable(false)->unsigned(false)->default(null)->comment(null)->change();
        });
    }
}
