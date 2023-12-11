<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complaint extends Model
{
    use HasFactory;

    protected $table        =   "complaint";
    protected $primaryKey   =   "id";
    protected $fillable     =   [
        'id_user',
        'title_complaint',
        'complaint',
        'id_agency',
        'id_category',
        'id_region',
        'location',
        'longitude',
        'latitude',
        'image',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function agency()
    {
        return $this->belongsTo(agency::class, 'id_agency', 'id');
    }

    public function category()
    {
        return $this->belongsTo(category::class, 'id_category', 'id');
    }

    public function region()
    {
        return $this->belongsTo(region::class, 'id_region', 'id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'id_complaint');
    }
}
