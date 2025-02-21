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
        Schema::create('coupe_one_componets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('machine_id')->constrained('coupe_ones')->onDelete('cascade'); // Link to machines table
            $table->string('name')->default('unknown');
            $table->integer('matricule')->default(0);
            $table->integer('objnbreg')->default(0);
            $table->integer('nbreg')->default(0);
            $table->integer('production')->default(0);
            $table->integer('dpndebobine')->default(0);
            $table->integer('mp')->default(0);
            $table->integer('tempsmort')->default(0);
            $table->integer('mce')->default(0);
            $table->integer('reglage')->default(0);
            $table->integer('process')->default(0);
            $table->integer('nbdeafaut')->default(0);
            $table->integer('nbheures')->default(0);
            $table->integer('metal')->default(0);
            $table->integer('echantilliondecfa')->default(0);
            $table->integer('echantilliondereglage')->default(0);
            $table->integer('refusmachine')->default(0);
            $table->integer('refusqualite')->default(0);
            $table->integer('refusprototype')->default(0);
            $table->integer('totalscrapemachine')->default(0);
            $table->string('group')->default('Unknow');
            $table->string('namecm')->default('Unkown');
            $table->integer('fill')->default('0');
            $table->integer('scrappic')->default('0');
            $table->integer('terminal')->default('0');
            $table->date('date')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupe_one_componets');
    }
};
