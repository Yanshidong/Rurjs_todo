<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('key',10)->default('')->comment('排序关键字,eg:16_, coder_,all_');
            $table->text('orders')->nullable(true)->comment('todoId排序信息,eg:1,2,3,4,5,6');
            //与todo多对一关联.
            $table->unsignedBigInteger('todo_id')->comment('与 todos关联');
            $table->unique('key');
            $table->index('todo_id');
            $table->foreign('todo_id')->references('id')->on('todos')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo_orders');
    }
}
