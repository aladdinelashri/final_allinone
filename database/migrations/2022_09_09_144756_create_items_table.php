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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('Name', 50);
             $table->string('Size', 50)->nullable();
             $table->string('Weight', 50)->nullable();
             $table->string('Color', 50)->nullable();
             $table->foreignId('sizeoption_id')->constrained()->default(1);
             $table->foreignId('coloroption_id')->constrained()->default(1);
             $table->foreignId('weightoption_id')->constrained()->default(1);
             $table->foreignId('categoryitem_id')->constrained();
             $table->foreignId('brand_id')->constrained()->default(1);
             $table->text('Note')->nullable();
             $table->boolean('in_stock')->default(0);
             $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
