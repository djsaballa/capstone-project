<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_client_profiles', function (Blueprint $table) {
            $table->id();
            $table->binary('picture')->nullable();
            $table->boolean('privacy_consent')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('contact_number')->nullable();
            $table->integer('age')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('occupation')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->integer('division')->nullable();
            $table->integer('district')->nullable();
            $table->integer('locale')->nullable();
            $table->string('baptism_date')->nullable();
            $table->string('philhealth_member')->nullable();
            $table->string('health_card')->nullable();
            $table->string('contact_person1_name')->nullable();
            $table->string('contact_person1_contact_number')->nullable();
            $table->string('contact_person2_name')->nullable();
            $table->string('contact_person2_contact_number')->nullable();
            $table->string('background_info')->nullable();
            $table->binary('background_info_attachment')->nullable();
            $table->string('action_taken')->nullable();
            $table->binary('action_taken_attachment')->nullable();
            $table->string('locale_servant_remark')->nullable();
            $table->string('zone_servant_remark')->nullable();
            $table->string('district_servant_remark')->nullable();
            $table->string('social_worker_recommendation')->nullable();
            $table->string('status')->nullable();
            $table->foreignId('user_encoder_id')
                  ->nullable()
                  ->constrained('users')
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
        Schema::dropIfExists('temp_client_profiles');
    }
};
