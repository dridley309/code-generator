<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('codes', function (Blueprint $table) {
            $table->renameColumn('code', 'value');
        });
    }

    public function down(): void
    {
        Schema::table('codes', function (Blueprint $table) {
            $table->renameColumn('value', 'code');
        });
    }
};
