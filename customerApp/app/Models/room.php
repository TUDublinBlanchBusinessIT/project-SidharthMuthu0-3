<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'room'; // your table name
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'room_number',
        'room_type',
        'price',
        'is_available'
    ];

    protected $casts = [
        'id' => 'integer',
        'room_number' => 'integer',
        'room_type' => 'string',
        'price' => 'decimal:2',
        'is_available' => 'boolean'
    ];

    public static $rules = [
        'room_number' => 'nullable|integer',
        'room_type' => 'nullable|string|max:50',
        'price' => 'nullable|numeric',
        'is_available' => 'nullable|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
    ];

    /**
     * Accessor for readable status
     */
    public function getStatusAttribute()
    {
        return $this->is_available ? 'Available' : 'Unavailable';
    }
}
