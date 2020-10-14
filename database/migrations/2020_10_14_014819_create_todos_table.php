<?php

use App\Helper\Redprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            Redprint::obj($table)->name();
            Redprint::obj($table)->description();
            $table->integer('do_at')->default(0)->comment('任务计划于这个时间点前完成');
            $table->integer('do_from')->default(0)->comment('未来任务,该任务计划从这个时间点开始;0:表示直接开始');
            $table->integer('done_at')->default(0)->comment('0:未完成,1:已完成');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}
