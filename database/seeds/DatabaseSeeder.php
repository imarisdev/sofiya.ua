<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ComplexTableSeeder::class);
    }
}

class ComplexTableSeeder extends Seeder {

    public function run() {

        \App\Models\Complex::create(['title' => 'ЖК Мартынов', 'slug' => 'jk-martinov']);
        \App\Models\Complex::create(['title' => 'ЖК Клубный', 'slug' => 'jk-klubniy']);
    }

}
