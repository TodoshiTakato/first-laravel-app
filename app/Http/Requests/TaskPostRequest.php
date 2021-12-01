<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskPostRequest extends FormRequest
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
            'task' => 'required | max:255',
            'rating' => 'integer | between:1,5'
        ];
    }

    public function messages()
    {
        return [
            'task.required' => 'Вы должны ввести таску!',
        ];
    }

//    public function withValidator($validator)
//    {
//        if (!$validator->fails()) {
//            $validator->after(function ($validator) {
//
//                if (Cache::has($this->mobile)) {
//                    if (Cache::get($this->mobile) != $this->code) {
//                        $validator->errors()->add('code', 'code is incorrect!');
//                    } else {
//                        $this->user = User::where('mobile', $this->mobile)->first();
//                    }
//                } else {
//                    $validator->errors()->add('code', 'code not found!');
//                }
//
//                if(!$this->checkAvailable($this->input(['check_in', 'check_out']))){
//                    $validator->errors()->add('unavailable', 'The dates you selected are busy!');
//                }
//
//            });
//        }
//    }

//    public function afterValidator($validator)
//    {
//        if ($this->somethingElseIsInvalid()) {
//            $validator->errors()->add('field', 'Something is wrong with this field!');
//        };
//    }



}
