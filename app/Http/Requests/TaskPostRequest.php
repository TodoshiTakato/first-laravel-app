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
            'name' => 'required | max:255',
            'details' => 'required | string | min:10 | max:65535',
            'status' => 'required | integer | between:0,1',
            'priority' => 'required | integer | between:0,5',
            'start_time' => 'required | date',
            'finish_time' => 'required | date',
            'time_spent' => 'required | integer | between:1,5',
//            'rating' => 'nullable | integer | between:1,5',
        ];
    }

//    public function messages()
//    {
//        return [
//            'name.required' => 'Вы должны ввести название таски!',
//        ];
//    }

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
