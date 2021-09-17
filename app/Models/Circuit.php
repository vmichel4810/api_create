<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circuit extends Model
{
    use HasFactory;

    protected $primaryKey = 'circuitId';

    protected $hidden = ['created_at', 'update_at'];

    public function createCircuit($data){
        $this->circuitRef = $data['circuitRef'];
        $this->name = $data['name'];
        $this->location = $data['location'];
        $this->country = $data['country'];
        $this->lat = $data['lat'];
        $this->lng = $data['lng'];
        $this->alt = $data['alt'];
        $this->url = $data['url'];
        $this->save();
    }

    public function updateCircuit($data){
        $this->circuitRef = $data['circuitRef'];
        $this->save();
    }

    public function race($data){
        return $this->hasMany(Race::class);
        // return $this->belongsTo(Race::class);

    }
}
