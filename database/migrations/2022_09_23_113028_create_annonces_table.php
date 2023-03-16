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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('pk')->nullable();
            $table->foreignId('category')->nullable();
            $table->foreignId('sous_category')->nullable();
            $table->foreignId('commune')->nullable();
            $table->string('titre')->nullable();
            $table->integer('prix')->nullable();
            $table->boolean('actif')->default(false);
            $table->boolean('deleted')->default(false);
            $table->boolean('boosted')->default(false);
            $table->integer('vue')->default(0);
            $table->longText('details')->nullable();
            $table->foreignId('toogler_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('photo_1')->nullable();
            $table->string('photo_2')->nullable();
            $table->string('photo_3')->nullable();
            $table->string('photo_4')->nullable();
            $table->string('photo_5')->nullable();
            $table->string('photo_6')->nullable();
            $table->string('photo_7')->nullable();
            $table->string('photo_8')->nullable();
            $table->string('photo_9')->nullable();
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
        Schema::dropIfExists('annonces');
    }
};
