<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Team;
use App\Player;

class EssentialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->integer('position')->unsigned();
            $table->string('handle');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('birthplace')->nullable();
            $table->string('stream_username')->nullable();
            $table->integer('stream_user_id')->nullable();
            $table->string('image')->nullable();
            $table->boolean('sub')->default(0);
            $table->boolean('retired')->default(0);
            $table->dateTime('last_online')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('acronym');
            $table->string('logo')->nullable();
            $table->integer('region_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
        
        // Insert Data
        
        // Teams
        
        $teams = [
            [
                'acronym' => 'TSM',
                'name' => 'Team Solo Mid',
                'logo' => '',
                'region_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'acronym' => 'IMT',
                'name' => 'Immortals',
                'logo' => '',
                'region_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        Team::insert($teams);
        
        // Players
        $players = [
            [
                'handle' => 'hauntzer',
                'position' => 1,
                'first_name' => 'Kevin',
                'last_name' => 'Yarnell',
                'birthplace' => 'USA',
                'stream_username' => 'tsm_hauntzer',
                'team_id' => 1,
                'image' => '/img/players/hauntzer.png',
                'sub' => 0,
                'retired' => 0,
            ],
            [
                'handle' => 'svenskeren',
                'position' => 2,
                'first_name' => 'Dennis',
                'last_name' => 'Johnsen',
                'birthplace' => 'Denmark',
                'stream_username' => 'tsm_svenkeren',
                'team_id' => 1,
                'image' => '/img/players/svenkeren.png',
                'sub' => 0,
                'retired' => 0,
            ],
            [
                'handle' => 'bjergsen',
                'position' => 3,
                'first_name' => 'Søren',
                'last_name' => 'Bjerg',
                'birthplace' => 'Denmark',
                'stream_username' => 'tsm_bjergsen',
                'team_id' => 1,
                'image' => '/img/players/bjergsen.png',
                'sub' => 0,
                'retired' => 0,
            ],
            [
                'handle' => 'doublelift',
                'position' => 4,
                'first_name' => 'Yiliang',
                'last_name' => 'Peng',
                'birthplace' => 'USA',
                'stream_username' => 'tsm_doublelift',
                'team_id' => 1,
                'image' => '/img/players/doublelift.png',
                'sub' => 0,
                'retired' => 0,
            ],
            [
                'handle' => 'biofrost',
                'position' => 5,
                'first_name' => 'Vincent',
                'last_name' => 'Wang',
                'birthplace' => 'Canada',
                'stream_username' => 'tsm_biofrost',
                'team_id' => 1,
                'image' => '/img/players/biofrost.png',
                'sub' => 0,
                'retired' => 0,
            ]
        ];
        Player::insert($players);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
        Schema::dropIfExists('teams');
    }
}
