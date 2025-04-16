<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class guest
 * @package App\Models
 * @version April 16, 2025, 2:42 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $bookings
 * @property string $first_name
 * @property string $last_name
 * @property string $phone_number
 * @property string $email
 * @property string $national_id
 */
class guest extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'guest';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'national_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'phone_number' => 'string',
        'email' => 'string',
        'national_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_name' => 'nullable|string|max:50',
        'last_name' => 'nullable|string|max:50',
        'phone_number' => 'nullable|string|max:15',
        'email' => 'nullable|string|max:100',
        'national_id' => 'nullable|string|max:20',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class, 'guest_id');
    }
}
