<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePowerSourceTypeTowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('power_source_type_tower', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('others')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('power_source_type_id');
            $table->unsignedBigInteger('power_supplier_id')->nullable();
            $table->unsignedBigInteger('tower_id');
        

            $table->foreign('power_source_type_id')
            ->references('id')
            ->on('power_source_types')
            ->onDelete('cascade');

            $table->foreign('power_supplier_id')
                ->references('id')
                ->on('power_suppliers')
                ->onDelete('cascade');

            $table->foreign('tower_id')
                ->references('id')
                ->on('towers')
                ->onDelete('cascade');

           
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('power_source_tower');
    }
}
