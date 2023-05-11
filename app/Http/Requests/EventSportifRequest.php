<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventSportifRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "nom"=>["required","max:100"],
            "description"=>["required"],
            "lieu"=>["required","max:100"],
            "dateDebut"=>["required"],
            "dateFin"=>["required"]
        ];
    }
}
