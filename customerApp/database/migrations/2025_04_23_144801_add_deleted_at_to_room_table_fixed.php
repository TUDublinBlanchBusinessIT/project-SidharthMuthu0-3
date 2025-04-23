<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('room', function (Blueprint $table) {
            if (!Schema::hasColumn('room', 'deleted_at')) {
                $table->softDeletes(); // ✅ Adds deleted_at
            }
        });
    }

    public function down()
    {
        Schema::table('room', function (Blueprint $table) {
            if (Schema::hasColumn('room', 'deleted_at')) {
                $table->dropSoftDeletes(); // ✅ Clean rollback
            }
        });
    }
};
