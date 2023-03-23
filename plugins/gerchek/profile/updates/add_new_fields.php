<?php namespace Gerchek\Profile\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddNewFields extends Migration
{

    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->string('wallet')->nullable();
            $table->boolean('best_farmer')->default(0);
        });
    }

    public function down()
    {
        $table->dropDown([
            'wallet',
            'best_farmer',
        ]);
    }

}
