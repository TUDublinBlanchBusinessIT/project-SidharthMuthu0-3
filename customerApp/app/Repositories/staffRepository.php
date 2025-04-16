<?php

namespace App\Repositories;

use App\Models\staff;
use App\Repositories\BaseRepository;

/**
 * Class staffRepository
 * @package App\Repositories
 * @version April 16, 2025, 2:57 pm UTC
*/

class staffRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'position',
        'phone_number',
        'email',
        'hire_date'
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
        return staff::class;
    }
}
