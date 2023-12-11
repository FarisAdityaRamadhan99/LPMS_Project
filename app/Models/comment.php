<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $table        =   "comment";
    protected $primaryKey   =   "id";
    protected $fillable     =   [
        'id_user',
        'id_complaint',
        'parent_id',
        'comment',
    ];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}


