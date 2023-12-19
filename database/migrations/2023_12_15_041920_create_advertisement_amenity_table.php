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
        Schema::create('advertisement_amenity', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('advertisement_id');
            $table->unsignedBigInteger('amenity_id');

            $table->index('advertisement_id', 'advertisement_amenity_advertisement_idx');
            $table->index('amenity_id', 'advertisement_amenity_amenity_idx');

            $table->foreign('advertisement_id')
                ->on('advertisements')
                ->references('id')
                ->onDelete('cascade') ;
            $table->foreign('amenity_id')
                ->on('amenities')
                ->references('id')
                ->onDelete('cascade') ;

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisement_amenities');
    }
};
