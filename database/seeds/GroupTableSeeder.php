<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($groupCount = 1; $groupCount <= 2; $groupCount++) {
            $group       = new Group();
            $group->name = 'Group_' . $groupCount;
            $group->save();
        }
    }
}
