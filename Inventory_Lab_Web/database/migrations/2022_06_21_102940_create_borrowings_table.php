<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->integer('borrowing_id', true);
            $table->integer('user_id')->index('FK_user_id');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('return_at');
            $table->enum('status', ['Returned', 'Late_Returned', 'Borrowed', '']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowings');
    }
}
