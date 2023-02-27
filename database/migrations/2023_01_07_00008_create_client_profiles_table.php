<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('gender');
            $table->integer('age');
            $table->date('birth_date');
            $table->string('occupation');
            $table->integer('height');
            $table->integer('weight');
            $table->string('baptism_date')->nullable();
            $table->string('contact_person1_name');
            $table->integer('contact_person1_contact_number');
            $table->string('contact_person2_name');
            $table->integer('contact_person2_contact_number');
            $table->string('background_info');
            $table->string('action_taken');
            $table->string('locale_servant_remark');
            $table->string('district_servant_remark');
            $table->string('division_servant_remark');
            $table->string('social_worker_recommendation');
            $table->foreignId('employee_encoder_id')
                  ->constrained('employees')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('locale_id')
                  ->constrained('locales')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_profiles');
    }
}
