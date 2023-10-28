<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateItemRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:2|max:255',
            // name unique for the current user, another user can still use that name, which is unique to himself
            'name' => Rule::unique('items')->where('user_id', $this->user()->id)->ignore($this->item),
            'price' => 'required|numeric|min:50',
            'category_id' => 'required|numeric|min:1',
            // category exists and belongs to the current user
            'category_id' => Rule::exists('categories', 'id')->where('user_id', $this->user()->id)
            //
        ];
    }
}
