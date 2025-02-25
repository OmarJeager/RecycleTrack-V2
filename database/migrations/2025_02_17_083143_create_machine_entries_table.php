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
                $table->integer('matricule')->nullable()->default(0);
                $table->float('echantillon_cfa')->nullable()->default(0);
                $table->float('refus_machine')->nullable()->default(0);
                $table->float('refus_prototype')->nullable()->default(0);
                $table->float('refus_mc')->nullable()->default(0);
                $table->float('production')->nullable()->default(0);
                $table->float('nb_reg')->nullable()->default(0);
                $table->float('maint')->nullable()->default(0);
                $table->float('pcl')->nullable()->default(0);
                $table->float('refus_mc2')->nullable()->default(0);
                $table->float('production2')->nullable()->default(0);
                $table->float('nb_reg2')->nullable()->default(0);
                $table->float('maint2')->nullable()->default(0);
                $table->float('pcl2')->nullable()->default(0);
                $table->float('refus_mc3')->nullable()->default(0);
                $table->float('production3')->nullable()->default(0);
                $table->float('nb_reg3')->nullable()->default(0);
                $table->float('maint3')->nullable()->default(0);
                $table->float('pcl3')->nullable()->default(0);
                $table->float('refus_mc4')->nullable()->default(0);
                $table->float('production4')->nullable()->default(0);
                $table->float('nb_reg4')->nullable()->default(0);
                $table->float('maint4')->nullable()->default(0);
                $table->float('pcl4')->nullable()->default(0);
                $table->float('nb_carte_kan')->nullable()->default(0);
                $table->float('nb_heures')->nullable()->default(0);
                $table->string('group')->default('unknown');
                $table->string('name_mc')->default('unknown');
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
