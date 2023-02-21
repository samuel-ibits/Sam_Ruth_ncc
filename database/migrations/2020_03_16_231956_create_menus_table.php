<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('folder');
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('submenus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('url');
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->unsignedBigInteger('permission_id')->nullable();
            $table->text('description');
            $table->boolean('is_visible')->default(false);
            $table->boolean('is_entry')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
                ->onDelete('cascade');

                $table->foreign('permission_id')
                    ->references('id')
                    ->on('permissions')
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
        Schema::dropIfExists('submenus');
        Schema::dropIfExists('menus');
    }
}
