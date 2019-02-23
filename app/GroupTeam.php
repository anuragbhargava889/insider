<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupTeam extends Model
{
    protected $table = 'group_team';

    protected $fillable = ['group_id', 'team_id'];
}
