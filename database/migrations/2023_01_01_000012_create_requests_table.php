<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('details');
            $table->date('date_updated');
            $table->foreignId('priority_id')
                  ->constrained('priorities')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('requests');
    }
}
