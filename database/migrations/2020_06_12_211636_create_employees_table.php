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
        if (!Schema::hasTable('employees')) {
            Schema::create('employees', function (Blueprint $table) {
                $table->id();
                $table->string('f_name');
                $table->string('l_name');
                $table->unsignedBigInteger('company');
                $table->foreign('company')->references('id')->on('companies')->onDelete('cascade');
                $table->string('email')->unique();
                $table->integer('phone')->nullable();
                $table->string('updated_at')->nullable();
                $table->string('created_at')->nullable();
            });
        }
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
