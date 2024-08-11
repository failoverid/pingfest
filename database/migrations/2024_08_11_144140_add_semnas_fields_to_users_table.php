<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('registeredSemnas')->default(false);
            $table->string('PaymentSemnas')->nullable();
            $table->string('QRSemnas')->nullable();
            $table->enum('VerifySemnas', ['not registered','verified', 'unverified','Problem'])->default('not registered');
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('registeredSemnas');
            $table->dropColumn('PaymentSemnas');
            $table->dropColumn('QRSemnas');
            $table->dropColumn('VerifySemnas');
        });
    }    
};
