<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;
use App\Models\Customer;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constrained()->onDelete('restrict');
            $table->foreignIdFor(Customer::class)->constrained()->onDelete('restrict');
            $table->date('rental_date')->useCurrent();
            $table->date('return_date')->nullable();
            $table->date('returned_at')->nullable();
            $table->boolean('active')->default(true);
            $table->decimal('total_amount')->nullable();
            $table->decimal('late_fee', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
