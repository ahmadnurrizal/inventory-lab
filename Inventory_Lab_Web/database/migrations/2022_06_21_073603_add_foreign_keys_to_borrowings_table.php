<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBorrowingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('borrowings', function (Blueprint $table) {
            $table->foreign(['borrowing_id'], 'borrowings_ibfk_1')->references(['borrowing_id'])->on('borrowing_items')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('borrowings', function (Blueprint $table) {
            $table->dropForeign('borrowings_ibfk_1');
        });
    }
}
