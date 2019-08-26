<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('reports_to')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('extension', 10);
            $table->string('email', 100);
            $table->string('job_title');
            $table->timestamps();

            $table->foreign('reports_to')
            ->references('id')
            ->on('employees')
            ->onUpdate('cascade');
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
