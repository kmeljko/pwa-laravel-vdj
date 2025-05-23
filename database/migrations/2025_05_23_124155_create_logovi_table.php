<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('logovi', function (Blueprint $table) {
            $table->id();
            $table->string('naziv', 100);
            $table->text('opis');
            $table->unsignedBigInteger('po_receptu');
            $table->string('slika', 500)->nullable();
            $table->timestamps();

            $table->foreign('po_receptu')->references('id')->on('recepti')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logovi');
    }
};
