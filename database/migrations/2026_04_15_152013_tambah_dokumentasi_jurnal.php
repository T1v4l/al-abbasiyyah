<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('jurnals', function (Blueprint $table) {
            
            $table->text('dokumentasi')->nullable()->after('saran_untuk_dirumah'); 
        });
    }

    public function down()
    {
        Schema::table('jurnals', function (Blueprint $table) {
            $table->dropColumn('dokumentasi');
        });
    }
};