<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');

            $table->longText('description')->nullable();

            $table->decimal('prince', 6, 2)->default(0);
            $table->decimal('prince_paid', 6, 2)->default(0);

            $table->dateTime('due_date');
            $table->dateTime('payment_date');

            $table->enum('type', ['Dinheiro', 'Cartão de Crédito', 'Conta Corrente', 'Empréstimo', 'Transferência']);

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->integer('source_id')->unsigned();
            $table->foreign('source_id')->references('id')->on('sources');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
