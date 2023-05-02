<?php

use App\Models\Category;
use App\Models\Quote;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('category_quote', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Quote::class)->constrained()->cascadeOnDelete();
            $table->unique(['category_id', 'quote_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_quote');
    }
};
