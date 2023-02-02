<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditAgentTowerAuditTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_agent_tower_audit_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('audit_type_id');
            $table->unsignedBigInteger('audit_agent_tower_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('audit_type_id')
            ->references('id')
            ->on('audit_types')
            ->onDelete('cascade');

            $table->foreign('audit_agent_tower_id')
            ->references('id')
            ->on('audit_agent_tower')
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
        Schema::dropIfExists('audit_agent_tower_audit_type');
    }
}
