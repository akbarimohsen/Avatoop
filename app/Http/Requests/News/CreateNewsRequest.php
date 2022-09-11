<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsRequest extends FormRequest
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
            'header'=>'required',
            'description'=>'required',
            'NewsDate'=>'required',
            'team' => 'required',
            'tag'=>'required',
            'category'=>'required',
            'newsImage'=>'required|image|mimes:png,jpg,jpeg',//1MB
            'editor1'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'فیلد عنوان اجباری است',
            'newsHeader.required' => 'فیلد سرتیتر خبر اجباری است',
            'NewsDate.required' => 'فیلد تاریخ خبر باید وارد شود',
            'team.required'=> 'انتخاب تیم مربوط به خبر الزامی است',
            'tag.required'=> 'تگ های هر خبر باید انتخاب شوند',
            'category.required'=> 'دسته بندی های خبر باید وارد شوند',
            'newsImage.required'=> 'تصویر خبر رو وارد نکردی برادر!',
            'newsImage.image'=>'فایل حتما باید عکس باشه',
            'newsImage.max'=>'عکس حداکثر میتونه 1MB باشه :)',
            'editor1.required'=>'متن خبر باید نوشته شه!',
            'description.required'=>'متن خبر باید نوشته شه!',
            'description.min'=>'توضیحات خبر باید حداقل 70 کاراکتر باشه',
            'description.max'=>'توضیحات خبر باید حداکثر 320 کاراکتر باشه',
        ];
    }
}
