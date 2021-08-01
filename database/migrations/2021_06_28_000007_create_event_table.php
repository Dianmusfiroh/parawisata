<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'event';

    /**
     * Run the migrations.
     * @table event
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nama', 45)->nullable();
            $table->date('day')->nullable();
            $table->Time('time')->nullable();
            $table->string('location', 45)->nullable();
            $table->string('desc', 45)->nullable();
            $table->string('pic', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
