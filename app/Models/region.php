<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    use HasFactory;

    protected $table        =   "region";
    protected $primaryKey   =   "id";
    protected $fillable     =   [
        'id',
        'name',
    ];

    public function complaint()
    {
        return $this->hasMany(Complaint::class, 'id_region');
    }
}
