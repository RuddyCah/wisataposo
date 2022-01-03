<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('destinations', function(Blueprint $table) {
            $table->renameColumn('gambar_judul', 'gambar');
        });
    }


    public function down()
    {
        Schema::table('destinations', function(Blueprint $table) {
            $table->renameColumn('gambar_judul', 'gambar');
        });
    }
}
