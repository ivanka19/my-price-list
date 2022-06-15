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
        if(!Schema::hasTable('sales')) {
            Schema::create('sales', function (Blueprint $table) {
                $table->bigIncrements('saleId');
                $table->bigInteger('percent');
                $table->date('dataEnd');

                $table->timestamps();
            });
        }

        Schema::table('sales', function (Blueprint $table) {
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
        Schema::dropIfExists('sales');
    }
};
