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
        Schema::table('live_show_feeds', function (Blueprint $table) {
            $table->string('live_url')->nullable()->after('end_time'); // Replace existing_column_name with the column after which you want this field
            $table->integer('group_id')->nullable()->after('live_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('live_show_feeds', function (Blueprint $table) {
            //
        });
    }
};
