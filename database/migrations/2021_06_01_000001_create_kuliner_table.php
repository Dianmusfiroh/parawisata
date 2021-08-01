<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKulinerTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'kuliner';

    /**
     * Run the migrations.
     * @table kuliner
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 45)->nullable();
            $table->text('address')->nullable();
            $table->text('menu')->nullable();

            $table->text('info')->nullable();
            $table->text('jarak')->nullable();
            $table->text('harga')->nullable();
            $table->string('pic1', 255)->nullable();
            $table->string('pic2', 255)->nullable();
            $table->string('pic3', 255)->nullable();
            $table->string('pic4', 255)->nullable();
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
