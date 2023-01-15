<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('no')->nullable();
            $table->string('name')->nullable();
            $table->string('course')->nullable();
            $table->string('program')->nullable();
            $table->string('year')->nullable();
            // $table->integer('year')->nullable();
            $table->string('lecturer')->nullable();
            $table->string('session')->nullable();
            $table->tinyInteger('sem')->nullable();
            $table->integer('section')->nullable();
            $table->string('IC')->nullable();
            $table->string('matric')->nullable();
            $table->decimal('PO1')->nullable();
            $table->decimal('PO2')->nullable();
            $table->decimal('PO3')->nullable();
            $table->decimal('PO4')->nullable();
            $table->decimal('PO5')->nullable();
            $table->decimal('PO6')->nullable();
            $table->decimal('PO7')->nullable();
            $table->decimal('PO8')->nullable();
            $table->decimal('PO9')->nullable();
            $table->decimal('PO10')->nullable();
            $table->foreignId('file_id')->nullable();
            $table->foreignId('user_id')->nullable();
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
        Schema::dropIfExists('students');
    }
}
