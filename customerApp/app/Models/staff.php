<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class staff
 * @package App\Models
 * @version April 16, 2025, 2:57 pm UTC
 *
 * @property string $first_name
 * @property string $last_name
 * @property string $position
 * @property string $phone_number
 * @property string $email
 * @property string $hire_date
 */
class staff extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'staff';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'first_name',
        'last_name',
        'position',
        'phone_number',
        'email',
        'hire_date'
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
        'position' => 'string',
        'phone_number' => 'string',
        'email' => 'string',
        'hire_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_name' => 'nullable|string|max:50',
        'last_name' => 'nullable|string|max:50',
        'position' => 'nullable|string|max:50',
        'phone_number' => 'nullable|string|max:15',
        'email' => 'nullable|string|max:100',
        'hire_date' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
