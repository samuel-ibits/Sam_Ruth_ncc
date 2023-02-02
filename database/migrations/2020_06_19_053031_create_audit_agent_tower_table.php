<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditAgentTowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_agent_tower', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("tower_id");
            $table->unsignedBigInteger("audit_agent_id");
            $table->timestamp("audit_date");
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('tower_id')
            ->references('id')
            ->on('towers')
            ->onDelete('cascade');

            $table->foreign('audit_agent_id')
            ->references('id')
            ->on('audit_agents')
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
        Schema::dropIfExists('audit_agent_tower');
    }
}
