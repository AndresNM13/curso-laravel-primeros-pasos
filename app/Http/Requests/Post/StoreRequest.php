<?php

namespace App\Http\Requests\post;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Str;

class StoreRequest extends FormRequest
{
    protected function prepareForValidation()
        {
            $this->merge([
                //'slug' => Str::slug($this->title)
                'slug' => str($this->title)->slug()//funcion de ayuda, se pueden pasar mas cosas de la funcion Str
            ]);
        }

    static public function myRules()
    {      

        return [
            'title' => 'required|min:5|max:500',
            'slug' => 'required|min:5|max:500|unique:posts',
            'content' => 'required|min:7',
            'category_id' => 'required|integer',
            'description' => 'required|min:7',
            'posted' => 'required'
        ];
    }
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
        return $this->myRules();
    }
}
