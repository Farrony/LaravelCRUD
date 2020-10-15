<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\post;

class PostRequest extends FormRequest
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
        $rules= Post::VALADATION_RULES;  
        if ( $this->getMethod() == 'PUT' ) {
            $rules['title'][2] = 'unique:posts,title,'.$this->route('post'); //post parameter diye id receive
        }
        return $rules;
    }

    public function messages() {
        return [
            'title.required' => 'Post Title field is required!',
        ];
    }
}
