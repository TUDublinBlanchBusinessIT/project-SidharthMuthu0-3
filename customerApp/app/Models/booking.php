<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class booking
 * @package App\Models
 * @version April 16, 2025, 2:49 pm UTC
 *
 * @property \App\Models\Guest $guest
 * @property integer $guest_id
 * @property integer $room_number
 * @property string $check_in_date
 * @property string $check_out_date
 * @property string $payment_status
 */
class booking extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'booking';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'guest_id',
        'room_number',
        'check_in_date',
        'check_out_date',
        'payment_status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'guest_id' => 'integer',
        'room_number' => 'integer',
        'check_in_date' => 'date',
        'check_out_date' => 'date',
        'payment_status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'guest_id' => 'nullable|integer',
        'room_number' => 'nullable|integer',
        'check_in_date' => 'nullable',
        'check_out_date' => 'nullable',
        'payment_status' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function guest()
    {
        return $this->belongsTo(\App\Models\Guest::class, 'guest_id');
    }
}
