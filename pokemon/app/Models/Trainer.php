<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $table = 'trainer';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';

    public function energies()
    {
        return $this->belongsToMany(Energy::class, 'maitrise', 'id_trainer', 'id_energy');
    }
}
