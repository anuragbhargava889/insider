<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupTeam;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $groups = Group::all();

        return view('Group.index', compact('groups'));
    }

    /**
     * @param Request $request
     *
     * @return $this
     */
    public function draw(Request $request)
    {
        try {
            $groups      = Group::all(['id']);
            $groupsCount = $groups->count();

            $teams      = Team::all(['id']);
            $teamsCount = $teams->count();

            if ($teamsCount % $groupsCount === 0) {
                $teamsArray  = $teams->pluck('id')->toArray();
                $groupsArray = $groups->pluck('id')->toArray();
                $pieces      = array_chunk($teamsArray, ceil(count($teamsArray) / 2));
                foreach ($groupsArray as $key => $value) {
                    foreach ($pieces[$key] as $piece) {
                        GroupTeam::create(['group_id' => $value, 'team_id' => $piece]);
                    }
                }

                return redirect()->back()->withErrors('Assign Successfully');
            }

            return redirect()->back()->withErrors("inconsistency in team count and group count.");
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     *
     */
    public function standing()
    {
        $schedules = DB::table('group_team')
            ->select(DB::raw("group_concat(team_id) as team_id"), "group_id")
            ->groupBy('group_id')
            ->get();

        return view('Group.schedule', compact('schedules'));
    }

    /**
     * @param $arrays
     *
     * @return array
     */
    private function getCombinations($arrays)
    {
        $result = [[]];
        foreach ($arrays as $property => $property_values) {
            $tmp = [];
            foreach ($result as $result_item) {
                foreach ($property_values as $property_key => $property_value) {
                    $tmp[] = $result_item + [$property_key => $property_value];
                }
            }
            $result = $tmp;
        }

        return $result;
    }
}
