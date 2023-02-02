<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTowerInsuranceCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_company_tower', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('insurance_company_id');
            $table->unsignedBigInteger('tower_id');
            $table->unsignedBigInteger('insurance_policy_id');
            $table->unsignedBigInteger('insurance_limit_id');
            $table->timestamp('expires_at');
            $table->decimal('insurancepremium');
            $table->timestamps();

            $table->foreign('insurance_limit_id')
                ->references('id')
                ->on('insurance_limits')
                ->onDelete('cascade');

                $table->foreign('insurance_policy_id')
                    ->references('id')
                    ->on('insurance_policies')
                    ->onDelete('cascade');

            $table->foreign('insurance_company_id')
                    ->references('id')
                    ->on('insurance_companies')
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
        Schema::dropIfExists('tower_insurance');
    }
}
