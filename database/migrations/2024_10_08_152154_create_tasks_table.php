<?php

use App\Models\Project;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Project::class);
            $table->string('title');
            $table->text('description');
            $table->enum('priority', ['High', 'Medium', 'Low']);
            $table->date('due_date');
            $table->time('due_hour');
            $table->enum('status', ['Done', 'In Progress', 'Not Started']);
            $table->enum(['isNotify'], ['0', '1']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
