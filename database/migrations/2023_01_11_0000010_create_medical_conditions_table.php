<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_conditions', function (Blueprint $table) {
            $table->id();
            $table->date('since_when');
            $table->string('medicine_supplements');
            $table->string('dosage');
            $table->string('frequency');
            $table->foreignId('client_profile_id')
                  ->constrained('client_profiles')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('disease_id')
                  ->constrained('diseases')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('medical_category_id')
                  ->nullable()
                  ->constrained('medical_categories')
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
        Schema::dropIfExists('medical_conditions');
    }
}
