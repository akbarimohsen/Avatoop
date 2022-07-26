<?php

namespace App\Http\Requests\Rss;

use Illuminate\Foundation\Http\FormRequest;

class CreateRssRequest extends FormRequest
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
            'title'=>'required',
            'description'=>'required',
            'teams' => 'required',
            'tag'=>'required',
            'category'=>'required',
            'rssImage'=>'required|image|max:1000',//1MB
            'editor1'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'فیلد عنوان اجباری است',
            'teams.required'=> 'انتخاب تیم مربوط به خبر الزامی است',
            'tag.required'=> 'تگ های هر خبر باید انتخاب شوند',
            'category.required'=> 'دسته بندی های خبر باید وارد شوند',
            'rssImage.required'=> 'تصویر خبر رو وارد نکردی برادر!',
            'rssImage.image'=>'فایل حتما باید عکس باشه',
            'rssImage.max'=>'عکس حداکثر میتونه 1MB باشه :)',
            'editor1.required'=>'متن خبر باید نوشته شه!',
            'description.required'=>'متن خبر باید نوشته شه!',
            'description.min'=>'متن خبر باید حداقل 70 کاراکتر باشه',
            'description.max'=>'متن خبر باید حداکثر 320 کاراکتر باشه',
        ];
    }
}
