<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreExpenseRequest extends FormRequest
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
            'item_id' => 'required|numeric|min:1',
            // exists and belong to the current user
            'item_id' => Rule::exists('items', 'id')->where('user_id', $this->user()->id),
            'quantity' => 'required|numeric|min:1',
            'date' => 'required|date',
            'note' => 'nullable'
            //
        ];
    }
}
