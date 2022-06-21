<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('user_id', true);
            $table->string('user_name', 64);
            $table->string('email', 64)->unique('user_email');
            $table->string('password', 32);
            $table->string('phone_number', 13)->unique('user_phone_number');
            $table->string('address', 128);
            $table->enum('role', ['Mahasiswa', 'Pembina Lab', 'Kordinator Asisten', 'Wakil Kordinator Asisten', 'Humas', 'Sekretaris', 'Inventaris', 'Bendahara']);
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
}
