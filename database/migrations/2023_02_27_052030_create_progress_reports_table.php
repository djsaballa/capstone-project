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
        Schema::create('progress_reports', function (Blueprint $table) {
            $table->id();
            $table->date('date_time');
            $table->foreignId('assignee_employee_id')
                ->constrained('employees')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('assignee_contact_number');
            $table->string('case_note');
            $table->string('remarks');
            $table->binary('attachment');
            $table->foreignId('client_profile_id')
                ->constrained('client_profiles')
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
        Schema::dropIfExists('progress_reports');
    }
};
