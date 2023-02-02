<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantTowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_tower', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("tenant_id");
            $table->unsignedBigInteger("tower_id");
            $table->unsignedBigInteger("antenna_type_id");
            $table->unsignedBigInteger("antenna_make_id");
            $table->unsignedBigInteger("antenna_model_id");
            $table->string("configuration");
            $table->boolean("active");
            $table->timestamps();

            $table->foreign('tenant_id')
            ->references('id')
            ->on('tenants')
            ->onDelete('cascade');

            $table->foreign('tower_id')
                ->references('id')
                ->on('towers')
                ->onDelete('cascade');

            $table->foreign('antenna_make_id')
                ->references('id')
                ->on('antenna_makes')
                ->onDelete('cascade');

            $table->foreign('antenna_type_id')
                ->references('id')
                ->on('antenna_types')
                ->onDelete('cascade');

            $table->foreign('antenna_model_id')
                ->references('id')
                ->on('antenna_models')
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
        Schema::dropIfExists('tenant_tower');
    }
}
