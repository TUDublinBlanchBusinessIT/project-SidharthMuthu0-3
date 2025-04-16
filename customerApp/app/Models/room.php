<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class room
 * @package App\Models
 * @version April 16, 2025, 3:00 pm UTC
 *
 * @property integer $room_number
 * @property string $room_type
 * @property number $price
 * @property boolean $is_available
 */
class room extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'room';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'room_number',
        'room_type',
        'price',
        'is_available'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'room_number' => 'integer',
        'room_type' => 'string',
        'price' => 'decimal:2',
        'is_available' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'room_number' => 'nullable|integer',
        'room_type' => 'nullable|string|max:50',
        'price' => 'nullable|numeric',
        'is_available' => 'nullable|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
