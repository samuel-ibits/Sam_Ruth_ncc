<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceEngineersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_engineers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("maintenance_agent_id");
            $table->unsignedBigInteger("maintenance_schedule_id");
            $table->unsignedBigInteger("tower_id");
            $table->string('name');
            $table->boolean("active");
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('maintenance_agent_id')
                ->references('id')
                ->on('maintenance_agents')
                ->onDelete('cascade');


            $table->foreign('maintenance_schedule_id')
            ->references('id')
            ->on('maintenance_schedules')
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
        Schema::dropIfExists('maintenance_engineers');
    }
}
