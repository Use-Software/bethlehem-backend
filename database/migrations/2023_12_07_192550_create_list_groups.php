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
        Schema::create('list_groups', function (Blueprint $table) {
                $table->id();
                $table->string('email');
                $table->unsignedBigInteger('group_id'); // Chave estrangeira
                $table->timestamps();
        
                $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_groups');
    }
};
