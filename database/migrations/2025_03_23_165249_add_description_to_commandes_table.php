<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('commandes', function (Blueprint $table) {
        $table->text('description')->nullable();  // Adds the description column (use 'text' for longer descriptions)
    });
}

public function down()
{
    Schema::table('commandes', function (Blueprint $table) {
        $table->dropColumn('description');
    });
}

};
