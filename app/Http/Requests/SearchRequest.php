<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SearchRequest
 *
 * @package App\Http\Requests
 */
class SearchRequest extends FormRequest
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
        return [
            'query' => 'bail|required_without_all:only_lists,only_tags',
            'only_lists' => 'bail|required_without_all:query,only_tags',
            'only_tags' => 'bail|required_without_all:query,only_lists',
        ];
    }

    /**
     * Specifies custom error messages for the special validations.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'query.required_without_all' => trans('search.validation_query_missing'),
            'only_lists.required_without_all'  => trans('search.validation_lists_missing'),
            'only_tags.required_without_all'  => trans('search.validation_tags_missing'),
        ];
    }
}
