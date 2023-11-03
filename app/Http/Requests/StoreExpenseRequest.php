<?php

namespace App\Http\Requests;

use Closure;
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
            'item_id' => [
                'required',
                'numeric',
                'min:0',
                function (string $attribute, mixed $value, Closure $fail) {
                    if ($value != 0 && !auth()->user()->items()->where('id', $value)->first()) {
                        return $fail("The $attribute must be either zero or a valid item id");
                    }
                }
            ],
            'item_name' => [
                'required',
                'string',
                'min:2',
                'max:255',
                Rule::unique('items', 'name')->where('user_id', $this->user()->id)->ignore($this->item_id)
            ],
            // unique for the current user
            'item_price' => 'required|numeric|min:50',
            // category exists and belongs to the current user
            'category_id' => [
                'required',
                'numeric',
                'min:1',
                'max:255',
                Rule::exists('categories', 'id')->where('user_id', $this->user()->id)
            ],
            // 'item_id' => 'required|numeric|exists:items,id,',
            // exists and belong to the current user
            // 'item_id' => Rule::exists('items', 'id')->where('user_id', $this->user()->id),
            'quantity' => 'required|numeric|min:1',
            'date' => 'required|date',
            'note' => 'nullable',
            'overwrite' => 'sometimes|in:on'
        ];
    }
}
