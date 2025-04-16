<?php

namespace App\Repositories;

use App\Models\room;
use App\Repositories\BaseRepository;

/**
 * Class roomRepository
 * @package App\Repositories
 * @version April 16, 2025, 3:00 pm UTC
*/

class roomRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'room_number',
        'room_type',
        'price',
        'is_available'
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
        return room::class;
    }
}
