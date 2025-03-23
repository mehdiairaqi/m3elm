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
        $table->string('adresse')->nullable();  // Add the 'adresse' column (nullable)
    });
}

public function down()
{
    Schema::table('commandes', function (Blueprint $table) {
        $table->dropColumn('adresse');  // Drop the 'adresse' column if rolling back
    });
}

};
