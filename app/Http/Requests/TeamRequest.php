<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'team' => 'required|string|min:5|max:75',
            'league_id' => 'required|integer',
            'gp' => 'required|integer',
            'win' => 'required|integer',
            'draw' => 'required|integer',
            'lost' => 'required|integer',
            'gf' => 'required|integer',
            'ga' => 'required|integer',
        ];
    }
}
