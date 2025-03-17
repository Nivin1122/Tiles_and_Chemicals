<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('products', function (Blueprint $table) {
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('area_of_use')->nullable();
        });
    }

    public function down(): void {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['size', 'color', 'area_of_use']);
        });
    }
};
