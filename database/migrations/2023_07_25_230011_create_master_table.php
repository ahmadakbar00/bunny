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
        Schema::create('master', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('id_collection')->nullable();
            $table->string('publish_status')->nullable();
            $table->string('last_activity_date')->nullable();
            $table->string('image')->nullable();
            $table->string('sinopsis')->nullable();
            $table->string('tag')->nullable();
            $table->string('genre')->nullable();
            $table->string('airing_status')->nullable(); //ongoing / completed
            $table->string('rating')->nullable();
            $table->string('total_views')->nullable(); //total views kunjungan series
            $table->string('total_streams')->nullable(); //total streams pervidio/episod
            $table->string('size')->nullable(); //size series
            $table->string('created_by')->nullable(); //user siapa
            $table->boolean('active')->default(true); //status postingan apa
            // 'id_collection',
            // 'guid_collection',
            // 'videoCount_collection',
            // 'size_collection'

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master');
    }
};
