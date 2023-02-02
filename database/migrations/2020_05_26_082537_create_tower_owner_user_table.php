<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTowerOwnerUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('tower_owner_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tower_owner_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tower_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('tower_owner_id')
                ->references('id')
                ->on('tower_owners')
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
        Schema::dropIfExists('tower_owner_user');
    }
}
