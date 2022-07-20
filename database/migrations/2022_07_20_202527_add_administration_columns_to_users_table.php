<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->string('picture')->nullable()->after('phone');
            $table->string('place_of_birth')->nullable()->after('picture');
            $table->date('date_of_birth')->nullable()->after('place_of_birth');
            $table->string('marriage_status')->nullable()->after('date_of_birth');
            $table->string('address')->nullable()->after('marriage_status');
            $table->string('identity_card_picture')->nullable()->after('address');
            $table->string('family_identity_card_picture')->nullable()->after('identity_card_picture');
            $table->string('tax_identity_picture')->nullable()->after('family_identity_card_picture');
            $table->string('salary_slip_picture')->nullable()->after('tax_identity_picture');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'picture',
                'place_of_birth',
                'date_of_birth',
                'marriage_status',
                'address',
                'identity_card_picture',
                'family_identity_card_picture',
                'tax_identity_picture',
                'salary_slip_picture',
            ]);
        });
    }
};
