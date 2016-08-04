<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
        CREATE TRIGGER menu_insert_trg BEFORE INSERT ON menu
        FOR EACH ROW
            IF NEW.parent > 0 THEN
                SET NEW.path = CONCAT((SELECT path FROM menu WHERE id = NEW.parent), '', NEW.slug);
            END IF;
        ");

        DB::unprepared("
        CREATE TRIGGER menu_update_trg BEFORE UPDATE ON menu
        FOR EACH ROW
            IF NEW.parent > 0 THEN
                SET NEW.path = CONCAT(IFNULL((SELECT CONCAT(path, '/') FROM menu WHERE id = NEW.parent), ''), NEW.slug);
            END IF;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `menu_insert_trg`');
        DB::unprepared('DROP TRIGGER `menu_update_trg`');
    }
}
