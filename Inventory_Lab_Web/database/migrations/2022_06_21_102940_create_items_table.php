<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->integer('item_id', true);
            $table->string('item_name', 64);
            $table->text('description');
            $table->enum('category', ['PC', 'Kursi', 'Meja', 'Sensor', 'Controller', 'etc']);
            $table->string('storage', 64);
            $table->string('image_url', 128);
            $table->enum('status', ['Ready', 'Borrowed', 'Maintenance', '']);
            $table->dateTime('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
