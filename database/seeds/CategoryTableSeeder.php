<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Essencial',
            'description' => 'Gastos Essenciais',
            'parent_id' => 0,
            'user_id' => 1,
        ]);

        DB::table('categories')->insert([
            'name' => 'Aluguel',
            'description' => 'Aluguel',
            'parent_id' => 1,
            'user_id' => 1,
        ]);

        DB::table('categories')->insert([
            'name' => 'Conta de luz',
            'description' => 'Conta de luz',
            'parent_id' => 1,
            'user_id' => 1,
        ]);

        DB::table('categories')->insert([
            'name' => 'Conta de agua',
            'description' => 'Conta de agua',
            'parent_id' => 1,
            'user_id' => 1,
        ]);

        DB::table('categories')->insert([
            'name' => 'Mercado',
            'description' => 'Mercado',
            'parent_id' => 1,
            'user_id' => 1,
        ]);
    }
}
