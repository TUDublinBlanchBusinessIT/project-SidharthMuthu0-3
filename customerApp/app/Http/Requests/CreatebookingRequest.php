<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatebookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'guest_id' => 'required|exists:guest,id',
            'room_number' => 'required|integer|min:1',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after_or_equal:check_in_date',
            'payment_status' => 'required|string|max:50',
        ];
    }
}
