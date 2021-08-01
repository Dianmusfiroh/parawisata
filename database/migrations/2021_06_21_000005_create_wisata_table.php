<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWisataTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'wisata';

    /**
     * Run the migrations.
     * @table wisata
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
            $table->text('deskripsi')->nullable();
            $table->text('jarak')->nullable();
            $table->string('pic1', 255)->nullable();
            $table->string('pic2', 255)->nullable();
            $table->string('pic3', 255)->nullable();
            $table->string('pic4', 255)->nullable();
            $table->integer('kategori_wisata_id')->unsigned();

            $table->index(["kategori_wisata_id"], 'fk_wisata_kategori_wisata1_idx');


            $table->foreign('kategori_wisata_id', 'fk_wisata_kategori_wisata1_idx')
                ->references('id')->on('kategori_wisata')
                ->onDelete('no action')
                ->onUpdate('no action');
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
