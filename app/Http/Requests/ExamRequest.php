<?php
namespace App\Http\Requests;
use App\Exam;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
class ExamRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return auth()->check();
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'title' => [
                'required', 'min:3'
            ],
            'description' => [
                'required', 'min:20'
            ],
            'tags' => [
                'required', 'min:20'
            ],
            'number_questions' => [
                'required', 'numeric', 'min:1', 'max:100'
            ],
            'duration' => [
                'required', 'numeric', 'min:3', 'max:240'
            ],
            'minimum_score' => [
                'required', 'numeric', 'min:20', 'max:100'
            ],
        ];
    }
}
