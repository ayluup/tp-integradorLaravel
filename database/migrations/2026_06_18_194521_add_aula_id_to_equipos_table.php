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
    Schema::table('equipos', function (Blueprint $table) {
        $table->unsignedBigInteger('aula_id')->nullable()->after('id');
        
        $table->foreign('aula_id')
              ->references('id')
              ->on('aulas')
              ->onDelete('set null');
    });
}

public function down()
{
    Schema::table('equipos', function (Blueprint $table) {
        $table->dropForeign(['aula_id']);
        $table->dropColumn('aula_id');
    });
}
};
