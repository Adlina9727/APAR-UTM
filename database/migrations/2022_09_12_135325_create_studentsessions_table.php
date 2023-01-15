<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentsessions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('No');
            $table->string('Name');
            $table->string('IC');
            $table->string('matric');
            $table->foreignId('formFile');
            $table->string('program');
            $table->foreignId('user_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studentsessions');
    }
}
