<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::latest()->paginate(8);
        return view('admin.tagsManagement.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:tags|max:255',
        ], [
            'name.unique' => 'برچسب موردنظر موجود است',
            'name.required' => 'گذاشتن نام برای برچسب ضروری است',
        ]);

        Tag::insert([
            'name' => $request->name,
            'views' => 0,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('tag.index')->with('success', 'برچسب با موفقیت افزوده شد');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::find($id);
        return view('admin.tagsManagement.edit', compact('tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:tags|max:255',
        ], [
            'name.unique' => 'برچسب موردنظر موجود است',
            'name.required' => 'گذاشتن نام برای برچسب ضروری است',
        ]);

        Tag::find($id)->Update([
            'name' => $request->name,
        ]);

        return redirect()->route('tag.index')->with('success', 'ویرایش برچسب با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy($id);
        session()->flash('success', 'برچسب مورد نظر با موفقیت حذف شد');
        return redirect()->route('tag.index');
    }

    public function search(Request $request)
    {
        $name = $request->name;
        $searchTag = Tag::where('name' , 'LIKE' , "%{$name}%")->orderBy('created_at','desc')->get();
        return view('admin.tagsManagement.search', compact('searchTag'));
    }
}
