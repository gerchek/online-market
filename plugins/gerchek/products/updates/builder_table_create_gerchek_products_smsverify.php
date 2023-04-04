<?php namespace Gerchek\Products\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateGerchekProductsSmsverify extends Migration
{
    public function up()
    {
        Schema::create('gerchek_products_smsverify', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('phone');
            $table->bigInteger('code');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('gerchek_products_smsverify');
    }
}
