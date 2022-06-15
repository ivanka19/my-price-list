<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('items')) {
            Schema::create('items', function (Blueprint $table) {
                $table->bigIncrements('itemId');
                $table->string('itemName', 50);
                $table->decimal('price', 10, 2);
                $table->decimal('salePrice', 10, 2)->nullable();
                $table->text('description')->nullable();
                $table->string('itemPhoto', 50)->nullable();
                $table->tinyInteger('available')->default(0);

                $table->timestamps();
            });
        }

        Schema::table('items', function (Blueprint $table) {
            $table->foreignId('categoryId')
            ->references('categoryId')->on('categories')
            ->onUpdate('cascade')->onDelete('cascade');;
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
};
