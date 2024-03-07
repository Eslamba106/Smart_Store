<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $id = $this->route("category");
        return Category::rules($id);
            //'This field (:attribute) is required',
    }
    public function messages(): array
    {
        return [        
            'required' => 'هذا الحقل (:attribute) مطلوب' ,
            'unique'=> 'هذا الاسم موجود بالفعل (:attribute)'
            // 'unique'=> 'This (:attribute) is already exists!',
        ];
    }
}
