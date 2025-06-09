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
        Schema::table('products', function (Blueprint $table) {
            $table->string('description') ->nullable()->after('name');
            $table->decimal('price', 8, 2) ->nullable()->after('description');
            $table->integer('stock') ->nullable()->after('price');
            $table->string('image') ->nullable()->after('stock');
            $table->boolean('is_active') ->default(true)->after('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('price');
            $table->dropColumn('stock');
            $table->dropColumn('image');
            $table->dropColumn('is_active');       
        });
    }
};
