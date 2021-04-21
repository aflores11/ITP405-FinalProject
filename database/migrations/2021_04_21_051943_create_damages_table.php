<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Damage;

class CreateDamagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damages', function (Blueprint $table) {
            $table->id();
            $table->string("damage_type");
            $table->timestamps();
        });

        $damages = [
            'Physical',
            'Magical'
        ];

        foreach($damages as $damage){
            $dam = Damage::create([
                'damage_type' => $damage
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
        Schema::dropIfExists('damages');
    }
}
