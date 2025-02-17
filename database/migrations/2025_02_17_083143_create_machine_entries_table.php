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
        Schema::create('machine_entries', function (Blueprint $table) {
                $table->id();
                $table->foreignId('machine_id')->constrained('sertissages')->onDelete('cascade'); // Link to machines table
                $table->string('name')->default('unknown');
                $table->integer('matricule')->default(0);
                $table->integer('echantillon_cfa')->default(0);
                $table->integer('refus_machine')->default(0);
                $table->integer('refus_prototype')->default(0);
                $table->integer('refus_mc')->default(0);
                $table->integer('production')->default(0);
                $table->integer('nb_reg')->default(0);
                $table->integer('maint')->default(0);
                $table->integer('pcl')->default(0);
                $table->integer('refus_mc2')->default(0);
                $table->integer('production2')->default(0);
                $table->integer('nb_reg2')->default(0);
                $table->integer('maint2')->default(0);
                $table->integer('pcl2')->default(0);
                $table->integer('refus_mc3')->default(0);
                $table->integer('production3')->default(0);
                $table->integer('nb_reg3')->default(0);
                $table->integer('maint3')->default(0);
                $table->integer('pcl3')->default(0);
                $table->integer('refus_mc4')->default(0);
                $table->integer('production4')->default(0);
                $table->integer('nb_reg4')->default(0);
                $table->integer('maint4')->default(0);
                $table->integer('pcl4')->default(0);
                $table->integer('nb_carte_kan')->default(0);
                $table->integer('nb_heures')->default(0);
                $table->string('group')->default('unknown');
                $table->string('name_mc')->default('unknown');
                $table->integer('wk')->default(0);
                $table->date('date')->default(now());
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machine_entries');
    }
};
