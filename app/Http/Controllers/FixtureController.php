<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Team;
use Illuminate\Support\Facades\DB;

class FixtureController extends Controller
{
    public function fixture()
    {
        try {
            $fixtureCollection = DB::table('group_team')
                                   ->select(DB::raw("group_concat(team_id) as team_id"), "group_id")
                                   ->groupBy('group_id')
                                   ->get();
            $fixtureArr        = $fixtureCollection->toArray();
            $group_1           = explode(',', $fixtureArr[0]->team_id);
            $group_2           = explode(',', $fixtureArr[1]->team_id);
            $scheduling_1      = $this->printCombination($group_1, sizeof($group_1), 2);
            $scheduling_2      = $this->printCombination($group_2, sizeof($group_2), 2);

            return view('Fixture.index', compact('fixtureCollection'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    private function printCombination($arr, $n, $r)
    {
        $data = [];

        $this->combinationUtil($arr, $data, 0, $n - 1, 0, $r);
    }

    private function combinationUtil($arr, $data, $start, $end, $index, $r)
    {
        // Current combination is ready
        // to be printed, print it
        if ($index == $r) {
            for ($j = 0; $j < $r; $j++) {
                echo $data[$j] . ',';
            }
            echo "|";

            return;
        }

        for ($i = $start; $i <= $end && $end - $i + 1 >= $r - $index; $i++) {
            $data[$index] = $arr[$i];
            $this->combinationUtil($arr, $data, $i + 1, $end, $index + 1, $r);
        }
    }
}
