<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Log extends Model
{
    protected $table = 'logovi'; 
    protected $fillable = ['naziv', 'opis', 'po_receptu', 'slika'];

    public function recept()
    {
        return $this->belongsTo(Recept::class, 'po_receptu');
    }
}
