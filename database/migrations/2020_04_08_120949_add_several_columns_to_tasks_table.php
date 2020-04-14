<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeveralColumnsToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {

            $table->datetime('assing_date')->nullable(); //依頼日
            $table->datetime('start_date')->nullable(); //作業開始日
            $table->datetime('end_date')->nullable(); //作業終了日
            $table->time('work_time')->nullable(); //作業にかかった時間


            $table->bigInteger('assigner_id')->unsigned();
            $table->bigInteger('assigning_id')->unsigned();
            // 外部キーを設定する
            $table->foreign('assigner_id')->references('id')->on('users'); //依頼した人のid
            $table->foreign('assigning_id')->references('id')->on('users'); //作業している人のid
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('assing_date');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
            $table->dropColumn('work_time');

            $table->dropForeign('tasks_assigner_id_foreign');
            $table->dropForeign('articles_assigning_id_foreign');
        });
    }
}
