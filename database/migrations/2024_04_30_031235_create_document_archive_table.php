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
        Schema::create('document_archive', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('document_id');
            $table->unsignedInteger('archive_id');
            $table->timestamps();

            $table->foreign('Document_id')->references('DocumentID')->on('documents')->onDelete('cascade');
            $table->foreign('Archive_id')->references('ArchiveID')->on('archives')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_archive');
    }
};
