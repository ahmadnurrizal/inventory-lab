<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBorrowingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('borrowing_items', function (Blueprint $table) {
            $table->foreign(['item_id'], 'borrowing_items_ibfk_2')->references(['item_id'])->on('items')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['borrowing_id'], 'borrowing_items_ibfk_1')->references(['borrowing_id'])->on('borrowings')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('borrowing_items', function (Blueprint $table) {
            $table->dropForeign('borrowing_items_ibfk_2');
            $table->dropForeign('borrowing_items_ibfk_1');
        });
    }
}
