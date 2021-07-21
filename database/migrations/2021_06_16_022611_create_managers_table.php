<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managers', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('id主键');
            $table->string('username',60)->comment('用户名称');
            $table->string('password',255)->comment('密码');
            $table->integer('status')->default(1)->comment('状态');
            $table->integer('role_id')->comment('角色ID');
            $table->string('createtime',60)->comment('创建时间');
            $table->charset='utf8mb4';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('managers');
    }
}
