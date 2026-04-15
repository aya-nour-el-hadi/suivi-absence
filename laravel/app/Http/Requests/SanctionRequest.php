<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SanctionRequest extends FormRequest
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
            'date'=>'required|date',
            'type_sanction' => 'required',
            'Motif'=>'string|max:255|nullable',
            'points_déduire'=>'required',
            'Autorite'=>'required',
            'stagiaire_id'=>'required|exists:stagiaires,id'
        ];
    }
}
// |in:Normal,1er Mise en garde,2ème Mise en garde,1er Avertissement,2ème Avertissement,Blâme,Exclusion 2 jours,Exclusion Temporaire,Exclusion Définitive'