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

    public function createCircuit($data) {
        $this->circuitRef = $data['circuitRef'];
        $this->forename = $data['forename'];
        $this->surname = $data['surname'];
        $this->url = $data['url'];
        $this->save();
    }

    public function updateDriver($data) {
        $this->circuitRef = $data['circuitRef'];
        $this->save();
    }
}
