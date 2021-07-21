<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenulistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menulist', function (Blueprint $table) {
            $table->id();
            $table->string('title',255)->comment('菜单名称');
            $table->integer('pid')->default(0)->comment('父级ID,为0时是第一级');
            $table->char('url',255)->comment('链接地址');
            $table->char('icon',60)->comment('标签');
            $table->char('create_time',255)->comment('创建时间');
            $table->charset="utf8mb4";
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menulist');
    }
}
