<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('jobs_id')->references('id')->on('jabatans');
            $table->foreign('countries_id')->references('id')->on('countries');
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('countries_id')->references('id')->on('countries');
        });

        Schema::table('districts', function (Blueprint $table) {
            $table->foreign('cities_id')->references('id')->on('cities');
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
            $table->dropForeign('users_jobs_id_foreign');
            $table->dropForeign('users_countries_id_foreign');
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->dropForeign('countries_countries_id_foreign');
        });

        Schema::table('districts', function (Blueprint $table) {
            $table->dropForeign('cities_cities_id_foreign');
        });
    }
}
