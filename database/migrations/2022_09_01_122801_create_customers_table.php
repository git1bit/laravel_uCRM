<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('m_name');
            $table->string('tel1');
            $table->string('tel2')->nullable();
            $table->string('postcode');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('temple')->nullable();
            $table->string('s_name1');
            $table->string('f_name1');
            $table->string('s_ruby1');
            $table->string('f_ruby1');
            $table->string('s_name2')->nullable();
            $table->string('f_name2')->nullable();
            $table->string('s_ruby2')->nullable();
            $table->string('f_ruby2')->nullable();
            $table->string('s_name3')->nullable();
            $table->string('f_name3')->nullable();
            $table->string('s_ruby3')->nullable();
            $table->string('f_ruby3')->nullable();
            $table->string('grave1')->nullable();
            $table->string('repair1')->nullable();
            $table->string('baltar1')->nullable();
            $table->string('bafittings1')->nullable();
            $table->string('grave2')->nullable();
            $table->string('repair2')->nullable();
            $table->string('baltar2')->nullable();
            $table->string('bafittings2')->nullable();
            $table->string('grave3')->nullable();
            $table->string('repair3')->nullable();
            $table->string('baltar3')->nullable();
            $table->string('bafittings3')->nullable();
            $table->string('grave4')->nullable();
            $table->string('repair4')->nullable();
            $table->string('baltar4')->nullable();
            $table->string('bafittings4')->nullable();
            $table->string('grave5')->nullable();
            $table->string('repair5')->nullable();
            $table->string('baltar5')->nullable();
            $table->string('bafittings5')->nullable();
            $table->string('grave6')->nullable();
            $table->string('repair6')->nullable();
            $table->string('baltar6')->nullable();
            $table->string('bafittings6')->nullable();
            $table->string('memo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
