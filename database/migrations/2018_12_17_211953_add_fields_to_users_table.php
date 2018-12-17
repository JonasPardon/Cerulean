<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');

            $table->string('first_name');
            $table->string('middle_names')->nullable();
            $table->string('last_name');
            $table->string('nickname')->nullable();
            $table->string('phone_number')->nullable();
            $table->date('birthday')->nullable();
            $table->string('gender')->default('Not specified');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name');

            $table->dropColumn('first_name');
            $table->dropColumn('middle_names');
            $table->dropColumn('last_name');
            $table->dropColumn('nickname');
            $table->dropColumn('phone_number');
            $table->dropColumn('birthday');
            $table->dropColumn('gender');
        });
    }
}
