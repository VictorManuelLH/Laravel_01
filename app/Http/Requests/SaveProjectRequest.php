<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class SaveProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool{
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array{
        return [
            'title' => 'required',
            'url' => [
                'required',
                Rule::unique('projects') -> ignore( $this -> route('project') )
            ],
            'category_id' => [
                'required',
                'exists:categories,id'
            ],
            'image' => [
                $this -> route('project') ? 'nullable' : 'required',
                'mimes:jpeg,png'
            ], //jpeg, png, bmp, gif, svg, webp
            'description' => 'required',
        ];
    }

    public function message(): array
    {
        return [
            'title.required' => 'The project needs a title',
        ];
    }
}
