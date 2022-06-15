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
        DB::unprepared('CREATE TRIGGER `delete-sale` BEFORE DELETE ON `sales` FOR EACH ROW BEGIN 
        UPDATE `items` SET `salePrice`=NULL WHERE `categoryId`=OLD.`categoryId`; END'); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `delete-sale`');
    }
};
