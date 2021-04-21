<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Type;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string("role_type");
            $table->timestamps();
        });

        $roles = [
            'Assassin',
            'Guardian',
            'Hunter',
            'Mage',
            'Warrior'
        ];

        foreach($roles as $role){
            $r = Type::create([
                'role_type' => $role
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
