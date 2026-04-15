<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StagiaireRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Nom' => 'required|max:255|string',
            'prénom' => 'required|max:255|string',
            'Nivaux'=> 'required|in:Débutant,Intermédiaire,Avancé',
            'Filière'=>'required|string',
            'date_debut'=>'required|date',
            'date_fin'=>'required|date',
            'group_class'=>'required|string'
        ];
    }
}
