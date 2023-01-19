<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BattleType extends Model
{
    use HasFactory;

    protected $table = 'battle_type';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
}
