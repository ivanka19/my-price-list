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
        if(!Schema::hasTable('companies')) {
            Schema::create('companies', function (Blueprint $table) {
                $table->bigIncrements('companyId');
                $table->string('companyName', 45)->unique();
                $table->string('phone', 15)->nullable();
                $table->string('city', 30)->nullable();
                $table->string('shortDescr', 30)->nullable();
                $table->text('companyDescription')->nullable();
                $table->string('logo', 50)->nullable();
                $table->string('color', 15)->default('#9e9e9e');

                $table->string('instagram', 70)->nullable();
                $table->string('facebook', 70)->nullable();
                $table->string('youTube', 70)->nullable();
                $table->string('tikTok', 70)->nullable();

                $table->timestamps();
            });
        }

        // Якщо існує - додати Foreign key
        Schema::table('companies', function (Blueprint $table) {
            $table->foreignId('userId')
            ->references('userId')->on('users')
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
        Schema::dropIfExists('companies');
    }
};
