<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pantheon;

class CreatePantheonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pantheons', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->timestamps();
        });

        $pantheons = [
            'Arthurian',
            'Babylonian',
            'Chinese',
            'Celtic',
            'Egyptian',
            'Greek',
            'Great Old Ones',
            'Hindu',
            'Japanese',
            'Maya',
            'Norse',
            'Polynesian',
            'Roman',
            'Slavic',
            'Voodoo',
            'Yoruba'
        ];

        foreach($pantheons as $pantheon){
            $pan = Pantheon::create([
                'name' => $pantheon
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
        Schema::dropIfExists('pantheons');
    }
}
