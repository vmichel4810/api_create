<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CircuitControllers;

class Circuit extends Model
{
    use HasFactory;

    protected $primaryKey = 'circuitId';

    protected $hidden = ['created_at', 'update_at'];

<<<<<<< HEAD
    public function createCircuit($data) {
        $this->circuitRef = $data['circuitRef'];
        $this->forename = $data['forename'];
        $this->surname = $data['surname'];
=======
    public function createCircuit($data){
        $this->circuitRef = $data['circuitRef'];
        $this->name = $data['name'];
        $this->location = $data['location'];
        $this->country = $data['country'];
        $this->lat = $data['lat'];
        $this->lng = $data['lng'];
        $this->alt = $data['alt'];
>>>>>>> d49919d2e9741a581200a78b511d61d2a33af012
        $this->url = $data['url'];
        $this->save();
    }

<<<<<<< HEAD
    public function updateDriver($data) {
        $this->circuitRef = $data['circuitRef'];
        $this->save();
    }
=======
    public function updateCircuit($data){
        $this->circuitRef = $data['circuitRef'];
        $this->save();
    }

    public function race($data){
        return $this->hasMany(Race::class);
        // return $this->belongsTo(Race::class);

    }
>>>>>>> d49919d2e9741a581200a78b511d61d2a33af012
}
