<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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

            "username" => 'required|unique:users|regex:/[آ-ی,a-z,A-Z]/',
            'email' => 'required|email|unique:users',
            "phone_number" => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users',
            "password" => 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ];
    }

    public function messages()
    {
        return [
            "username.required" => "فیلد نام باید وارد شود",
            "username.regex" => "فیلد نام باید حروف باشد",
            "email.required" => "فیلد ایمیل باید وارد شو",
            "email.email" => "فرمت وارد شده برای ایمیل صحیح نیست",
            "email.unique" => "کاربر با این ایمیل قبلا ثبت نام کرده است",
            "phone_number.required" => "فیلد شماره تلفن اجباری است",
            "phone_number.regex" => "فرمت شماره تلفن صحیح نمیباشد و حتما باید ار اپراتور های ایران باشد",
            "phone_number.digits" => "شماره تلفن باید 11 رقم باشد",
            "phone_number.numeric" => "شماره تلفن باید عدد باشد",
            "phone_number.unique" => "این شماره تلفن قبلا ثب شده است",
            "password.required" => "فیلد پسورد باید وارد شود",
            "password.regex" => "رمز عبور باید دارای کاراکترهای انگلیسی و عدد و کاراکترهای خاص (@*#) باشد. ضمنا رمز عبور باید حداقل 8 کاراکتر باشد و حداکثر 15 کاراکتر باشد.",
            "password.confirmed" => "مقدار دو رمز عبور باید یکسان باشد",
        ];
    }
}
