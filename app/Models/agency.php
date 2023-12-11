<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agency extends Model
{
    use HasFactory;

    protected $table        =   "agency";
    protected $primaryKey   =   "id";
    protected $fillable     =   [
        'name',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_agency');
    }

    public function complaint()
    {
        return $this->hasMany(Complaint::class, 'id_agency');
    }
}
