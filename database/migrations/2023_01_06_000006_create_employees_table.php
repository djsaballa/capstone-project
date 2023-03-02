<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('password');
            $table->integer('contact_number');
            $table->foreignId('role_id')
                  ->constrained('roles')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('locale_id')
                ->nullable()
                ->constrained('locales');
            $table->foreignId('district_id')
                ->nullable()
                ->constrained('districts');
            $table->foreignId('division_id')
                ->nullable()
                ->constrained('divisions');
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
        Schema::dropIfExists('employees');
    }
}