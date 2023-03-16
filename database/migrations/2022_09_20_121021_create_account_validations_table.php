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
        Schema::create('account_validations', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('user_email')->unique()->index();
            $table->mediumText('token')->nullable();
            $table->boolean('validated')->default(0);
            $table->dateTime('token_received_at')->nullable();
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
        Schema::dropIfExists('account_validations');
    }
};
