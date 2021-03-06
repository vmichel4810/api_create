<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    protected $primaryKey = 'raceId';

    protected $hidden = ['created_at', 'update_at'];

    public function createRace($data) {
        $this->year = $data['year'];
        $this->round = $data['round'];
        $this->circuitId = $data['circuitId'];
        $this->name = $data['name'];
        $this->date = $data['date'];
        $this->time = $data['time'];
        $this->url = $data['url'];
        $this->save();
    }

    public function updateRace($data){
        $this->year = $data['year'];
        $this->round = $data['round'];
        $this->circuitId = $data['circuitId'];
        $this->name = $data['name'];
        $this->date = $data['date'];
        $this->time = $data['time'];
        $this->url = $data['url'];
        $this->save();
    }

    public function circuit($data){

        return $this->belongsto(Circuit::class);
    }

    public function results($data){

        return $this->hasMany(Result::class);
    }
}
