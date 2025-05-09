<?php

namespace App\Repositories;

use App\Models\Guest; // ✅ Capital G — MUST match your model file
use App\Repositories\BaseRepository;

/**
 * Class guestRepository
 * @package App\Repositories
 * @version April 16, 2025, 2:42 pm UTC
 */
class guestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'national_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Guest::class; // ✅ Capital G — now Laravel will find it
    }
}
