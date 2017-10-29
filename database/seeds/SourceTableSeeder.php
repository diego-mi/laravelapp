<?php

use Illuminate\Database\Seeder;

class SourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert([
            'name' => 'Santander Conta Corrente',
            'type' => 2,
            'initial_balance' => 0,
            'current_balance' => 0,
            'description' => 'Conta bancaria',
            'user_id' => 1
        ]);
        DB::table('sources')->insert([
            'name' => 'Santander Cartao Diego',
            'type' => 1,
            'initial_balance' => 0,
            'current_balance' => 0,
            'description' => 'Cartao de Credito diego',
            'user_id' => 1
        ]);
        DB::table('sources')->insert([
            'name' => 'Santander Cartao Sabrina',
            'type' => 1,
            'initial_balance' => 0,
            'current_balance' => 0,
            'description' => 'Cartao de Credito Sabrina',
            'user_id' => 1
        ]);
    }
}
