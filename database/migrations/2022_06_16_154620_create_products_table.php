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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->text('short_description')->nullable();
            $table->string('slug')->unique();
            $table->decimal('price',8,2)->unsigned()->default(0);
            $table->decimal('special_price',8,2)->unsigned()->nullable();
            $table->string('special_price_type')->nullable();
            $table->date('special_price_start')->nullable();
            $table->date('special_price_end')->nullable();
            $table->decimal('selling_price',8,2)->unsigned()->nullable();
            $table->string('sku')->nullable();
            $table->boolean('manage_stock')->default(1);
            $table->integer('qty')->nullable();
            $table->boolean('in_stock')->default(1);
            $table->integer('viewed')->unsigned()->default(0);
            $table->boolean('is_active')->default(0);
            $table->foreignId('brand_id')->nullable()->constrained('brands');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
};
