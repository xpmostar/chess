<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Partija extends Model
{
    use HasFactory;

    protected $fillable = [
        'igrac1',
        'igrac2',
        'pobjednik'
    ];

    
    public function prviIgrac() {
        return $this->hasOne(Player::class, 'id', 'igrac1');
    }

    public function drugiIgrac() {
        return $this->hasOne(Player::class, 'id', 'igrac2');
    }

    protected $table = 'partija';
}
