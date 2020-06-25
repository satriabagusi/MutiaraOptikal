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
            $table->integer('no_transaksi');
            $table->string('lens_type');
            $table->integer('bpjs_status');
            $table->integer('lens_price');
            $table->integer('total_pay');
            $table->integer('total_transaction');
            $table->string('transaction_status');
            $table->text('keterangan')->nullable();
            $table->integer('id_user')->unsigned();
            $table->integer('id_patient')->unsigned();
            $table->integer('id_frame')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_patient')->references('id')->on('patients');
            $table->foreign('id_frame')->references('id')->on('frame_types');
            $table->foreign('updated_by')->references('id')->on('users');
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
