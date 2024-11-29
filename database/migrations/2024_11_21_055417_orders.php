<?php

use App\Models\User;
use Filament\Tables\Columns\Summarizers\Count;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('orders', function (Blueprint $table) {
        $user = User::where('user_id');

            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('order_number');
            $table->decimal('total', 10, 2)->nullable();
            $table->string('status')->default('Pending'); // pending, processing, completed, cancelled
            $table->text('message_for_seller')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
