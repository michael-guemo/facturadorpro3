<?php

use App\Models\Tenant\Configuration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLoginColumnToConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('configurations', function (Blueprint $table) {
            $table->text('login')->nullable()->after('default_document_type_03');
        });

        $configuration = Configuration::first();
        $login = [
            'type' => 'image',
            'image' => asset('images/login-fondo-1.png'),
        ];
        $configuration->login = $login;
        $configuration->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configurations', function (Blueprint $table) {
            $table->dropColumn('login');
        });
    }
}
