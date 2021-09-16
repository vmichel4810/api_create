<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constructor extends Model
{
    use HasFactory;

    use HasFactory;

    protected $primaryKey = 'ConstructorId';

    protected $hidden = ['created_at', 'update_at'];

    public function createConstructor($data) {
        $this->constructorRef = $data['constructorRef'];
        $this->name = $data['name'];
        $this->nationality = $data['nationality'];
        $this->url = $data['url'];
        $this->save();
    }

    public function updateDriver($data) {
        $this->constructorRef = $data['constructorRef'];
        $this->save();
    }

    public function results($data) {
        
        return $this->hasMany(Result::class); 
    }
}
