<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->boolean('ok');
            $table->boolean('found');
            $table->string('login');
            $table->string('password');
            $table->integer('org_id')->unique();
            $table->string('full_name');
            $table->string('full_name_en');
            $table->string('position_name');
            $table->string('division_name');
            $table->string('department_name');
            $table->string('office_name');
            $table->string('email');
            $table->tinyInteger('password_expires_in_days');
            $table->string('remark');
            $table->string('name');
            $table->string('name_en');
            $table->tinyInteger('reply_code');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
