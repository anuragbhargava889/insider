<?php

use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Team::class, 8)->create()->each(function ($team) {
            for ($playerCount = 1; $playerCount <= 11; $playerCount++) {
                $team->players()->save(factory(App\Player::class)->make());
            }
        });
    }
}
