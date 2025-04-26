<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'staff'; // your table name
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'position',
        'hire_date',
    ];
    
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone_number' => 'string',
        'position' => 'string',
        'is_active' => 'boolean',
    ];

    public static $rules = [
        'name' => 'nullable|string|max:100',
        'email' => 'nullable|email|max:100',
        'phone_number' => 'nullable|string|max:20',
        'position' => 'nullable|string|max:50',
        'is_active' => 'nullable|boolean',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
    ];

    /**
     * Accessor for readable status
     */
    public function getStatusAttribute()
    {
        return $this->is_active ? 'Active' : 'Inactive';
    }
}
