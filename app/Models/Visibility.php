<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visibility extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['store_id', 'filename', 'description'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $table = "visibilities";

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
