<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('guest', function (Blueprint $table) {
            if (!Schema::hasColumn('guest', 'deleted_at')) {
                $table->softDeletes(); // ✅ Safe add
            }
        });
    }

    public function down()
    {
        Schema::table('guest', function (Blueprint $table) {
            if (Schema::hasColumn('guest', 'deleted_at')) {
                $table->dropSoftDeletes(); // ✅ Safe drop
            }
        });
    }
};
