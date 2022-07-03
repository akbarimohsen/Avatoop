<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\League;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class LeagueManagementController extends Controller
{

    public function index()
    {
        //
        $leagues = League::all();

        return view('admin.leagueManagement.index',compact('leagues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.leagueManagement.add');
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
            'title' => 'required|string',
            'teams_count' => 'required',
            'logo' => 'required|mimes:png,jpg,jpeg'
        ]);

        $logo_name = time() . '.' . $request->logo->extension();

        //resize Image
        $dest_path = public_path('/assets/images/leagues');

        $logo = Image::make($request->logo->path());

        $logo->resize(370, 245 , function($constraint) {
            $constraint->aspectRatio();
        })->save($dest_path . '/' . $logo_name);

        $data['logo'] = $logo_name;

        League::create($data);

        session()->flash('message', 'لیگ با موفقیت ایجاد گردید');

        return redirect()->route('leagues.index');
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
    public function edit($id)
    {
        //
        $league = League::findOrFail($id);
        return view('admin.leagueManagement.edit', compact('league'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $league = League::findOrFail(intval($id));

        $data = $request->validate([
            'title' => 'required|string',
            'teams_count' => 'required',
            'logo' => 'nullable|mimes:png,jpg,jpeg'
        ]);


        if($request->has('logo'))
        {
            $logo_name = time() . '.' . $request->logo->extension();

            //resize Image
            $dest_path = public_path('/assets/images/leagues');

            $logo = Image::make($request->logo->path());

            $logo->resize(370, 245 , function($constraint) {
                $constraint->aspectRatio();
            })->save($dest_path . '/' . $logo_name);

            $data['logo'] = $logo_name;
            if(file_exists($dest_path . '/' . $league->logo))
            {
                unlink($dest_path . '/' . $league->logo);
            }
            $league->logo = $data['logo'];
        }

        $league->title = $data['title'];
        $league->teams_count = intval($data['teams_count']);

        $league->save();

        session()->flash('message', 'اطلاعات لیگ با موفقیت تغییر گردید.');

        return redirect()->route('leagues.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $league = League::find($id);

        $logo_path = public_path('/assets/images/leagues') . '/' . $league->logo;

        if(file_exists($logo_path))
        {
            unlink($logo_path);
        }
        $league->delete();

        session()->flash('message', 'لیگ با موفقیت حذف گردید.');

        return redirect()->route('leagues.index');
    }
}
