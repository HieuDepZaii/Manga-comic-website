<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comic', function (Blueprint $table) {
            $table->id();
            $table->string('comic_name');
            $table->foreignId('category_id')->constrained('the_loai');
            $table->string('mota')->nullable();
            $table->foreignId('ma_tac_gia')->constrained('users')->nullable();
            $table->date('year')->nullable();
            $table->string('anh_bia')->nullable();
            $table->integer('so_tap')->nullable();
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
        Schema::dropIfExists('comic');
    }
}
