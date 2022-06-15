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
        // Якщо таблиця не існує - створити її
        if(!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->bigIncrements('categoryId');
                $table->string('categoryName', 50);

                $table->timestamps();
            });
        }

        // Якщо існує - додати Foreign key
        Schema::table('categories', function (Blueprint $table) {
            $table->foreignId('companyId')
            ->references('companyId')->on('companies')
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
        Schema::dropIfExists('categories');
    }
};
