<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('joe_number', 20);
			$table->string('title', 20);
			$table->string('firstname', 100);
			$table->string('lastname', 100);
			$table->string('gender', 1);
			$table->date('dob');
			$table->string('email', 200);
			$table->string('phoneno', 100);
			$table->text('address', 65535);
			$table->integer('lga_id');
            $table->integer('state_id');
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
        Schema::dropIfExists('patients');
    }
}
