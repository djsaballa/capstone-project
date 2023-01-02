<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('remarks');
            $table->string('status');
            $table->date('date_submitted');
            $table->foreignId('client_profile_id')
                  ->constrained('client_profiles')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('employee_id')
                  ->constrained('employees')
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
        Schema::dropIfExists('submissions');
    }
}
