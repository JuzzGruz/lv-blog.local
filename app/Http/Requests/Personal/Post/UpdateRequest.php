<?php

namespace App\Http\Requests\Personal\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Name is required',
            'title.string' => 'Need text type',
            'content.required' => 'Content is required',
            'content.string' => 'Need text type',
            'preview_image.required' => 'Preview image is required',
            'preview_image.file' => 'Preview image is not file',
            'main_image.required' => 'Main image is required',
            'main_image.file' => 'Main image is not file'
        ];
    }
}
