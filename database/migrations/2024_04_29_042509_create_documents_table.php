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
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('DocumentID');
            $table->string('Title');
            $table->date('DateReceived');
            $table->string('Type');
            $table->string('Status');
            $table->date('DisposableDate')->nullable();
         
            $table->string('ResponsiblePerson')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
