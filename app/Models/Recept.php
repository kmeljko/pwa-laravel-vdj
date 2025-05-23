<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Recept extends Model
{
    protected $table = 'recepti'; 
    protected $fillable = ['naziv', 'opis'];

    public function logovi()
    {
        return $this->hasMany(Log::class, 'po_receptu');
    }
}
