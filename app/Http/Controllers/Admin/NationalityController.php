<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nationality;
use Illuminate\Http\Request;

class NationalityController extends Controller
{

    public function index()
    {
        //
        $nationalities = Nationality::all();

        return view('admin.nationalityManagement.index', [
            'nationalities' => $nationalities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.nationalityManagement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required|string'
        ]);

        Nationality::create($data);

        session()->flash('message', 'ملیت با موفقیت ایجاد گردید.');

        return redirect()->route('nationalities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nationality)
    {
        //
        $nationality = Nationality::find($nationality);

        return view('admin.nationalityManagement.edit', ['nationality' => $nationality]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nationality)
    {
        //
        $nation = Nationality::find($nationality);

        $data = $request->validate([
            'name' => 'required|string'
        ]);

        $nation->name = $data['name'];
        $nation->save();

        session()->flash('message', 'ملیت با موفقیت تغییر گردید');

        return redirect()->route('nationalities.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nationality)
    {
        //
        Nationality::destroy($nationality);

        session()->flash('message', 'ملیت با موفقیت حذف گردید');

        return redirect()->route('nationalities.index');
    }
}
