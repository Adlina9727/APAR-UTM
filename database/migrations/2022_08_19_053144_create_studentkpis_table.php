<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentkpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentkpis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('course')->nullable();
            $table->decimal('kpi_PO1')->nullable();
            $table->decimal('kpi_PO2')->nullable();
            $table->decimal('kpi_PO3')->nullable();
            $table->decimal('kpi_PO4')->nullable();
            $table->decimal('kpi_PO5')->nullable();
            $table->decimal('kpi_PO6')->nullable();
            $table->decimal('kpi_PO7')->nullable();
            $table->decimal('kpi_PO8')->nullable();
            $table->decimal('kpi_PO9')->nullable();
            $table->decimal('kpi_PO10')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('file_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studentkpis');
    }
}
