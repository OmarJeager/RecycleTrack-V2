<?php

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
        Schema::create('composo_four_componets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('machine_id')->constrained('composo_fours')->onDelete('cascade'); // Link to machines table
            $table->string('name')->default('unknown');
            $table->integer('matricule')->default(0);
            $table->float('objnbreg')->nullable()->default(0);
            $table->float('nbreg')->nullable()->default(0);
            $table->float('production')->nullable()->default(0);
            $table->float('dpndebobine')->nullable()->default(0);
            $table->float('mp')->nullable()->default(0);
            $table->float('tempsmort')->nullable()->default(0);
            $table->float('mce')->nullable()->default(0);
            $table->float('reglage')->nullable()->default(0);
            $table->float('process')->nullable()->default(0);
            $table->float('nbdeafaut')->nullable()->default(0);
            $table->float('nbheures')->nullable()->default(0);
            $table->float('metal')->nullable()->default(0);
            $table->float('echantilliondecfa')->nullable()->default(0);
            $table->float('echantilliondereglage')->nullable()->default(0);
            $table->float('refusmachine')->nullable()->default(0);
            $table->float('refusqualite')->nullable()->default(0);
            $table->float('refusprototype')->nullable()->default(0);
            $table->float('totalscrapemachine')->nullable()->default(0);
            $table->float('fill')->nullable()->default(0);
            $table->float('scrappic')->nullable()->default(0);
            $table->float('terminal')->nullable()->default(0);
            $table->string('group')->default('Unknow');
            $table->string('namecm')->default('Unkown');
            $table->date('date')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('composo_four_componets');
    }
};
