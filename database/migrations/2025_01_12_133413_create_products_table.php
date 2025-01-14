<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->float('length');
        $table->float('width');
        $table->float('height');
        $table->float('weight');
        $table->integer('quantity');
        $table->timestamps();
    });
}
};
