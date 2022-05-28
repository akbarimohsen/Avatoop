<?php

namespace App\Http\Controllers\Reporter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function create()
    {
        $categories=Category::latest()->paginate(3);
        return view('reporter.create-news-category.create',compact('categories'));
    }


    public function store(CreateCategoryRequest $request)
    {
        Category::create([
            "name" => $request->name
        ])->with('create','دسته بندی مورد نظر با موفقیت ایجاد شد');
        return redirect()->route('category.create');

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category=Category::findOrFail($id);
        return view('reporter.create-news-category.edit',compact('category'));
    }


    public function update(CreateCategoryRequest $request, $id)
    {
        Category::findOrFail($id)->update([
            "name" => $request->name,
        ]);

        return redirect()->route('category.create')->with('update','آیتم با موفقیت آپدیت شد');

    }

    public function destroy($id)
    {
        Category::destroy($id);
        session()->flash('delete','دسته بندی مورد نظر با موفقیت حذف شد');
        return redirect()->route('category.create');
    }
}
