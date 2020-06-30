<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        // هادا الكود عشان ما بنفع التصنيفات تتكرر فعمل هيك مشان لو بدو يعدل على تصنيف معين 
      
        $id=$this->route('category');//احضار رقم الاشي المنوي التعديل عليه
        return [
            'title' => 'required|unique:categories,title,'.$id.',id'
            
        ];
    }
}
