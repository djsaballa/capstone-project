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
        Schema::create('medical_operations', function (Blueprint $table) {
            $table->id();
            $table->string('operation')->nullable();
            $table->string('date')->nullable();
            $table->foreignId('medical_condition_id')
                  ->constrained('medical_conditions')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->timestamps();
        });//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
