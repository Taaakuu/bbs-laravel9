<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('topics', function (Blueprint $table) {
            // 当 user_id 对应的 users 表被删除时，删除对应的话题
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('replies', function (Blueprint $table) {
            // 当 user_id 对应的 users 表数据被删除时，删除对应的回复
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // 当 topic_id 对应的 topics 表数据被删除时，删除对应的回复
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('topics', function (Blueprint $table) {
            // 移除外键约束
            $table->dropForeign(['user_id']);
        });

        Schema::table('replies', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['topic_id']);
        });
    }
};
