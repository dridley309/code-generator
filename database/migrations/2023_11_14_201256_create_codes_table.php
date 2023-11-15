<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class CreateCodesTable extends Migration
{
    public function up(): void
    {
        $tableName = Config::get('code_generator.codes_table');

        Schema::create($tableName, function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->boolean('allocated')->default(false);
            $table->timestamps();
        });

        Schema::table($tableName, function (Blueprint $table) {
            $table->unique('value');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(
            Config::get('code_generator.codes_table'),
        );
    }
};
