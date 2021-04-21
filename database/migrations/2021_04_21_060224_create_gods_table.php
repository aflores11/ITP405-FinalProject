<?php

use App\Models\Damage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\God;
use App\Models\Pantheon;
use App\Models\Type;

class CreateGodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gods', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->foreignId('type_id')->constrained();
            $table->foreignId('pantheon_id')->constrained();
            $table->foreignId('damage_id')->constrained();
            $table->timestamps();
        });

        $gods = [
            'Achilles' => ['role' => 5, 'pantheon' => 'Greek', 'damage' => 1],
            'Agni' => ['role' => 4, 'pantheon' => 'Hindu', 'damage' => 2],
            'Ah Puch' => ['role' => 4, 'pantheon' => 'Maya', 'damage' => 2],
            'Amaterasu' => ['role' => 5, 'pantheon' => 'Japanese', 'damage' => 1],
            'Anhur' => ['role' => 3, 'pantheon' => 'Egyptian', 'damage' => 1],
            'Anubis' => ['role' => 4, 'pantheon' => 'Egyptian', 'damage' => 2],
            'Ao Kuang' => ['role' => 4, 'pantheon' => 'Chinese', 'damage' => 2],
            'Aphrodite' => ['role' => 4, 'pantheon' => 'Greek', 'damage' => 2],
            'Apollo' => ['role' => 3, 'pantheon' => 'Greek', 'damage' => 1],
            'Arachne' => ['role' => 1, 'pantheon' => 'Greek', 'damage' => 1],
            'Ares' => ['role' => 2, 'pantheon' => 'Greek', 'damage' => 2],
            'Artemis' => ['role' => 3, 'pantheon' => 'Greek', 'damage' => 1],
            'Artio' => ['role' => 2, 'pantheon' => 'Celtic', 'damage' => 2],
            'Athena' => ['role' => 2, 'pantheon' => 'Greek', 'damage' => 2],
            'Awilix' => ['role' => 1, 'pantheon' => 'Maya', 'damage' => 1],
            'Baba Yaga' => ['role' => 4, 'pantheon' => 'Slavic', 'damage' => 2],
            'Bacchus' => ['role' => 2, 'pantheon' => 'Roman', 'damage' => 2],
            'Bakasura' => ['role' => 1, 'pantheon' => 'Hindu', 'damage' => 1],
            'Baron Samedi' => ['role' => 4, 'pantheon' => 'Voodoo', 'damage' => 2],
            'Bastet' => ['role' => 1, 'pantheon' => 'Egyptian', 'damage' => 1 ],
            'Bellona' => ['role' => 5, 'pantheon' => 'Roman', 'damage' => 1],
            'Cabrakan' => ['role' => 2, 'pantheon' => 'Maya', 'damage' => 2],
            'Camazotz' => ['role' => 1, 'pantheon' => 'Maya', 'damage' => 1],
            'Cerberus' => ['role' => 2, 'pantheon' => 'Greek', 'damage' => 2],
            'Cernunnos' => ['role' => 3, 'pantheon' => 'Celtic', 'damage' => 1],
            'Chaac' => ['role' => 5, 'pantheon' => 'Maya', 'damage' => 1],
            'Chang\'e' => ['role' => 4, 'pantheon' => 'Chinese', 'damage' => 2],
            'Chernobog' => ['role' => 3, 'pantheon' => 'Slavic', 'damage' => 1],
            'Chiron' => ['role' => 3, 'pantheon' => 'Greek', 'damage' => 1],
            'Chronos' => ['role' => 4, 'pantheon' => 'Greek', 'damage' => 2],
            'Cthulhu' => ['role' => 2, 'pantheon' => 'Great Old Ones', 'damage' => 2],
            'Cu Chulainn' => ['role' => 5, 'pantheon' => 'Celtic', 'damage' => 1],
            'Cupid' => ['role' => 3, 'pantheon' => 'Roman', 'damage' => 1],
            'Da Ji' => ['role' => 1, 'pantheon' => 'Chinese', 'damage' => 1],
            'Danzaburou' => ['role' => 3, 'pantheon' => 'Japanese', 'damage' => 1],
            'Erlang Shen' => ['role' => 5, 'pantheon' => 'Chinese', 'damage' => 1],
            'Eset' => ['role' => 4, 'pantheon' => 'Egyptian', 'damage' => 2],
            'Fafnir' => ['role' => 2, 'pantheon' => 'Norse', 'damage' => 2],
            'Fenrir' => ['role' => 1, 'pantheon' => 'Norse', 'damage' => 1],
            'Freya' => ['role' => 4, 'pantheon' => 'Norse', 'damage' => 2],
            'Ganesha' => ['role' => 2, 'pantheon' => 'Hindu', 'damage' => 2],
            'Geb' => ['role' => 2, 'pantheon' => 'Egyptian', 'damage' => 2],
            'Guan Yu' => ['role' => 5, 'pantheon' => 'Chinese', 'damage' => 1],
            'Hachiman' => ['role' => 3, 'pantheon' => 'Japanese', 'damage' => 1],
            'Hades' => ['role' => 4, 'pantheon' => 'Greek', 'damage' => 2],
            'He Bo' => ['role' => 4, 'pantheon' => 'Chinese', 'damage' => 2],
            'Heimdallr' => ['role' => 3, 'pantheon' => 'Norse', 'damage' => 1],
            'Hel' => ['role' => 4, 'pantheon' => 'Norse', 'damage' => 2],
            'Hera' => ['role' => 4, 'pantheon' => 'Greek', 'damage' => 2],
            'Hercules' => ['role' => 5, 'pantheon' => 'Roman', 'damage' => 1],
            'Horus' => ['role' => 5, 'pantheon' => 'Egyptian', 'damage' => 1],
            'Hou Yi' => ['role' => 3, 'pantheon' => 'Chinese', 'damage' => 1],
            'Hun Batz' => ['role' => 1, 'pantheon' => 'Maya', 'damage' => 1],
            'Izanami' => ['role' => 3, 'pantheon' => 'Japanese', 'damage' => 1],
            'Janus' => ['role' => 4, 'pantheon' => 'Roman', 'damage' => 2],
            'Jing Wei' => ['role' => 3, 'pantheon' => 'Chinese', 'damage' => 1],
            'Jormungandr' => ['role' => 2, 'pantheon' => 'Norse', 'damage' => 2],
            'Kali' => ['role' => 1, 'pantheon' => 'Hindu', 'damage' => 1],
            'Khepri' => ['role' => 2, 'pantheon' => 'Egyptian', 'damage' => 2],
            'King Arthur' => ['role' => 5, 'pantheon' => 'Arthurian', 'damage' => 1],
            'Kukulkan' => ['role' => 4, 'pantheon' => 'Maya', 'damage' => 2],
            'Kumbhakarna' => ['role' => 2, 'pantheon' => 'Hindu', 'damage' => 2],
            'Kuzenbo' => ['role' => 2, 'pantheon' => 'Japanese', 'damage' => 2],
            'Loki' => ['role' => 1, 'pantheon' => 'Norse', 'damage' => 1],
            'Medusa' => ['role' => 3, 'pantheon' => 'Greek', 'damage' => 1],
            'Mercury' => ['role' => 1, 'pantheon' => 'Roman', 'damage' => 1],
            'Merlin' => ['role' => 4, 'pantheon' => 'Arthurian', 'damage' => 2],
            'Mulan' => ['role' => 5, 'pantheon' => 'Chinese', 'damage' => 1],
            'Ne Zha' => ['role' => 1, 'pantheon' => 'Chinese', 'damage' => 1],
            'Neith' => ['role' => 3, 'pantheon' => 'Egyptian', 'damage' => 1],
            'Nemesis' => ['role' => 1, 'pantheon' => 'Greek', 'damage' => 1],
            'Nike' => ['role' => 5, 'pantheon' => 'Greek', 'damage' => 1],
            'Nox' => ['role' => 4, 'pantheon' => 'Roman', 'damage' => 2],
            'Nu Wa' => ['role' => 4, 'pantheon' => 'Chinese', 'damage' => 2],
            'Odin' => ['role' => 5, 'pantheon' => 'Norse', 'damage' => 1],
            'Olorun' => ['role' => 4, 'pantheon' => 'Yoruba', 'damage' => 2],
            'Osiris' => ['role' => 5, 'pantheon' => 'Egyptian', 'damage' => 1],
            'Pele' => ['role' => 1, 'pantheon' => 'Polynesian', 'damage' => 1],
            'Persephone' => ['role' => 4, 'pantheon' => 'Greek', 'damage' => 2],
            'Poseidon' => ['role' => 4, 'pantheon' => 'Greek', 'damage' => 2],
            'Ra' => ['role' => 4, 'pantheon' => 'Egyptian', 'damage' => 2],
            'Raijin' => ['role' => 4, 'pantheon' => 'Japanese', 'damage' => 2],
            'Rama' => ['role' => 3, 'pantheon' => 'Hindu', 'damage' => 1],
            'Ratatoskr' => ['role' => 1, 'pantheon' => 'Norse', 'damage' => 1],
            'Ravana' => ['role' => 1, 'pantheon' => 'Hindu', 'damage' => 1],
            'Scylla' => ['role' => 4, 'pantheon' => 'Greek', 'damage' => 2],
            'Serqet' => ['role' => 1, 'pantheon' => 'Egyptian', 'damage' => 1],
            'Set' => ['role' => 1, 'pantheon' => 'Egyptian', 'damage' => 1],
            'Skadi' => ['role' => 3, 'pantheon' => 'Norse', 'damage' => 1],
            'Sobek' => ['role' => 2, 'pantheon' => 'Egyptian', 'damage' => 2],
            'Sol' => ['role' => 4, 'pantheon' => 'Norse', 'damage' => 2],
            'Sun Wukong' => ['role' => 5, 'pantheon' => 'Chinese', 'damage' => 1],
            'Susano' => ['role' => 1, 'pantheon' => 'Japanese', 'damage' => 1],
            'Sylvanus' => ['role' => 2, 'pantheon' => 'Roman', 'damage' => 2],
            'Terra' => ['role' => 2, 'pantheon' => 'Roman', 'damage' => 2],
            'Thanatos' => ['role' => 1, 'pantheon' => 'Greek', 'damage' => 1],
            'The Morrigan' => ['role' => 4, 'pantheon' => 'Celtic', 'damage' => 2],
            'Thor' => ['role' => 1, 'pantheon' => 'Norse', 'damage' => 1],
            'Thoth' => ['role' => 4, 'pantheon' => 'Egyptian', 'damage' => 2],
            'Tiamat' => ['role' => 4, 'pantheon' => 'Babylonian', 'damage' => 2],
            'Tsukuyomi' => ['role' => 1, 'pantheon' => 'Japanese', 'damage' => 1],
            'Tyr' => ['role' => 5, 'pantheon' => 'Norse', 'damage' => 1],
            'Ullr' => ['role' => 3, 'pantheon' => 'Norse', 'damage' => 1],
            'Vamana' => ['role' => 5, 'pantheon' => 'Hindu', 'damage' => 1],
            'Vulcan' => ['role' => 4, 'pantheon' => 'Roman', 'damage' => 2],
            'Xbalanque' => ['role' => 3, 'pantheon' => 'Maya', 'damage' => 1],
            'Xing Tian' => ['role' => 2, 'pantheon' => 'Chinese', 'damage' => 2],
            'Yemoja' => ['role' => 2, 'pantheon' => 'Yoruba', 'damage' => 2],
            'Ymir' => ['role' => 2, 'pantheon' => 'Norse', 'damage' => 2],
            'Zeus' => ['role' => 4, 'pantheon' => 'Greek', 'damage' => 2],
            'Zhong Kui' => ['role' => 4, 'pantheon' => 'Chinese', 'damage' => 2],
        ];

        foreach($gods as $name => $attr){
            $pantheon = Pantheon::where('name','=',$attr['pantheon'])->first()->id;

            $g = God::create([
                'name' => $name,
                'type_id' => $attr['role'],
                'pantheon_id' => $pantheon,
                "damage_id" => $attr['damage']
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
        Schema::dropIfExists('gods');
    }
}
