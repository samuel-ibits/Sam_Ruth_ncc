<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTowerDraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tower_drafts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('tower_owner_id');
            $table->unsignedBigInteger('lga_id');
            $table->unsignedBigInteger('tower_type_id');
            $table->unsignedBigInteger('user_id');
            $table->string('ncc_identity');
            $table->string('landlord_name');
            $table->string('contact_number');
            $table->text('address');
            $table->integer('height');
            $table->string('measurement_unit');
            $table->string('no_of_sections');
            $table->string("longitude")->nullable();
            $table->string("latitude")->nullable();
            $table->unique(['longitude', 'latitude']);

            $table->timestamp('erected_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('tower_type_id')
                    ->references('id')
                    ->on('tower_types')
                    ->onDelete('cascade');

            $table->foreign('tower_owner_id')
                    ->references('id')
                    ->on('tower_owners')
                    ->onDelete('cascade');

            $table->foreign('lga_id')
                ->references('id')
                ->on('lgas')
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
        Schema::dropIfExists('tower_drafts');
    }
}
