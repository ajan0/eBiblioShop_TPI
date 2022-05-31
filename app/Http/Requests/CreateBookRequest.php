<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // Force processing data provided by the API rather than that obtained
        // from readonly fields. This safety measure prevents data manipluation
        // from clients.
        if(session()->has('searchedBook'))
        {
            $searchedBook = session('searchedBook');
            $this->merge($searchedBook->getAttributes());
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|max:255',
            'price' => 'required|integer|min:0',
            'quantity' => 'required|integer|min:1',
            'published_at' => 'required|date',
            'isbn' => 'required|digits:13',
            'description' => 'required|min:20',
            'pages_num' => 'required|integer|min:0',
            'category_id' => 'required|integer|exists:categories,id',
        ];

        // If a cover was not provided by the API, the user must upload one.
        if (!$this->request->has('cover_path'))
        {
            $rules['cover'] = 'required|image|max:512';
        }

        // If authors information were not provided by the API, the user must provide them.
        if (!$this->request->has('authors'))
        {
            $rules['authors[]'] = 'required|array|min:1';
        }

        return $rules;
    }
}
