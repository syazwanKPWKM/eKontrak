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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('project_code')->unique();
            $table->date('sst_date');
            $table->string('jpict_number');
            $table->date('jpict_approval_date');
            $table->string('contract_period', 100);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('contract_value');
            $table->string('company_name');
            $table->string('company_pic');
            $table->string('department_owner');
            $table->string('project_owner');
            $table->string('officer_in_charge');
            $table->date('sealed_date');
            $table->string('contract_status');
            $table->mediumText('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
