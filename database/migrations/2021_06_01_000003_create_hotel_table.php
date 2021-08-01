<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'hotel';

    /**
     * Run the migrations.
     * @table hotel
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
            $table->text('info')->nullable();
            $table->text('harga')->nullable();
            $table->text('jarak')->nullable();
            $table->string('pic1', 255)->nullable();
            $table->string('pic2', 255)->nullable();
            $table->string('pic3', 255)->nullable();
            $table->string('pic4', 255)->nullable();
            // $table->unsignedInteger('fasilitas_id')->nullable();
            $table->string('fasilitas')->nullable();
            // $table->bigInteger('item_id')->unsigned();

            // $table->index(["item_id"], 'fk_hotel_item_idx');


            // $table->foreign('item_id', 'fk_hotel_item_idx')
            //     ->references('id')->on('item')
            //     ->onDelete('uncascade ')
            //     ->onUpdate('uncascade');
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
