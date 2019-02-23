<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('Team.index', compact('teams'));
    }
}
