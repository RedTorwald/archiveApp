<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->increments('ArchiveID');
            $table->integer('Row');
            $table->integer('Shelf');
            $table->integer('ShelfPosition');
            $table->integer('DocumentCapacity')->default(5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archives');
    }
};
