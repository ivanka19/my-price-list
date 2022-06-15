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
        DB::unprepared('CREATE TRIGGER `insert_sale` AFTER INSERT ON `sales` FOR EACH ROW BEGIN
                        IF NEW.`percent` <= 0 OR NEW.`percent` > 100 THEN SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Відсоток знижки не може бути менше 0 або більше 100"; END IF;
                        UPDATE `items` SET `salePrice`=`price` - `price`*(NEW.`percent`/100)  WHERE `categoryId`=NEW.`categoryId`; 
                        END'); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `insert_sale`');
    }
};
