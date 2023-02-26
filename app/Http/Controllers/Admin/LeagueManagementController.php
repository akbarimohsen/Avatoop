<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\League;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\type;

class LeagueManagementController extends Controller
{

    public function index()
    {
        $leagues = League::all();
        return view('admin.leagueManagement.index',compact('leagues'));
    }


    public function create()
    {
        return view('admin.leagueManagement.add');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|unique:leagues',
            'teams_count' => 'required',
            'api_id' => 'nullable|numeric',
            'logo' => 'required|mimes:png,jpg,jpeg'
        ]);

        $dir = 'images/leagues';
        $logo_name = time() . '.' . $request->logo->getClientOriginalName();
        $request->file('logo')->storeAs($dir,$logo_name,'ftp');


        League::create([
            'title'       => $data['title'],
            'teams_count' => $data['teams_count'],
            'api_id'      => $data['api_id'],
            'logo'        => "$dir/$logo_name"
        ]);

        session()->flash('message', 'لیگ با موفقیت ایجاد گردید');

        return redirect()->route('leagues.index');
    }


    public function show($id)
    {
        $league = League::find($id);

        if($league->api_id == null ){
            session()->flash("message", "شناسه api برای این لیگ وجود ندارد.");
            return redirect()->route('leagues.index');
        }

        if($league->api_id >= 1 && $league->api_id <= 17){
            $response = Http::get("https://api.avatoop.com/$league->api_id");
            $body = $response->body();
            $object = json_decode($body);
            $teams = $object->data;
            return view('admin.leagueManagement.show', compact('league', 'teams'));
        }else{
            session()->flash('message', "لیگ موردنظر شما در api موجود نمی‌باشد.");
            return redirect();
        }
    }

    public function showData($id){
        $league = League::find($id);

        if($league->api_id == null){
            session()->flash("message", "شناسه api برای این لیگ وجود ندارد.");
            return redirect()->route('leagues.index');
        }

        if($league->api_id >= 1 && $league->api_id <= 17){
            $content = Storage::disk('local')->get('leagues.json');
            $array = json_decode($content,true);
            $object = json_decode($array[$league->api_id]);
            return response()->json([
                "data" => $object->data
            ]);
        }else{
            session()->flash('message', "لیگ موردنظر شما در api موجود نمی‌باشد.");
            return redirect()->route('leagues.index');
        }

    }


    public function edit($id)
    {
        $league = League::findOrFail($id);
        return view('admin.leagueManagement.edit', compact('league'));
    }


    public function update(Request $request, $id)
    {
        //
        $league = League::findOrFail(intval($id));

        $data = $request->validate([
            'title' => 'required|string',
            'teams_count' => 'required',
            'api_id' => 'nullable|numeric',
            'logo' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        if($request->has('logo'))
        {

            $logo_name = time() . '.' . $request->logo->getClientOriginalName();

            //resize Image
            $dir = 'images/leagues';

            if(Storage::exists($league->logo)){
                Storage::delete($league->logo);
            }

            $request->file('logo')->storeAs($dir,$logo_name,'ftp');
            $league->logo = "$dir/$logo_name";
        }

        $league->title = $data['title'];
        $league->teams_count = intval($data['teams_count']);
        $league->api_id = intval($data['api_id']);

        $league->save();

        session()->flash('message', 'اطلاعات لیگ با موفقیت تغییر گردید.');

        return redirect()->route('leagues.index');
    }


    public function destroy($id)
    {
        //
        $league = League::find($id);

        if(Storage::exists($league->logo)){
            Storage::delete($league->logo);
        }

        $league->delete();

        session()->flash('message', 'لیگ با موفقیت حذف گردید.');

        return redirect()->route('leagues.index');
    }
}
