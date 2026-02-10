<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('image');        // ໄຟລ໌ຮູບ
            $table->string('title')->nullable();    // ຫົວຂໍ້ເທິງຮູບ (ຖ້າມີ)
            $table->string('description')->nullable(); // ຄຳອະທິບາຍ (ຖ້າມີ)
            $table->boolean('is_active')->default(true); // ເປີດ-ປິດ ການສະແດງຜົນ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
