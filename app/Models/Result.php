<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $primaryKey = 'driverId';

    protected $hidden = ['created_at', 'update_at'];

    public function createResult($data) {
        $this->resultId = $data['resultId'];
        $this->raceId = $data['raceId'];
        $this->driverid = $data['driverid'];
        $this->constructorId = $data['constructorId'];
        $this->number = $data['number'];
        $this->grid = $data['grid'];
        $this->position = $data['position'];
        $this->positionText = $data['positionText'];
        $this->positionOrder = $data['positionOrder'];
        $this->points = $data['points'];
        $this->laps = $data['laps'];
        $this->time= $data['time'];
        $this->milliseconds= $data['milliseconds'];
        $this->fastestLaps = $data['fastestLaps'];
        $this->rank = $data['rank'];
        $this->fastestLapTime = $data['fastestLapTime'];
        $this->fastestLapSpeed = $data['fastestLapSpeed'];
        $this->statusId = $data['statusId'];
        $this->save();
    }

    public function updateResult($data) {
        $this->resultId = $data['resultId'];
        $this->raceId = $data['raceId'];
        $this->driverid = $data['driverid'];
        $this->constructorId = $data['constructorId'];
        $this->number = $data['number'];
        $this->grid = $data['grid'];
        $this->position = $data['position'];
        $this->positionText = $data['positionText'];
        $this->positionOrder = $data['positionOrder'];
        $this->points = $data['points'];
        $this->laps = $data['laps'];
        $this->time= $data['time'];
        $this->milliseconds= $data['milliseconds'];
        $this->fastestLaps = $data['fastestLaps'];
        $this->rank = $data['rank'];
        $this->fastestLapTime = $data['fastestLapTime'];
        $this->fastestLapSpeed = $data['fastestLapSpeed'];
        $this->statusId = $data['statusId'];
        $this->save();
    }

    public function Driver($data) {
        return $this->belongsTo(Driver::class);
    }
}
