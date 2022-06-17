<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RuleRequest;
use App\Models\Rule;
use Illuminate\Http\Request;

class RulesController extends Controller
{

    public function index()
    {
        //
        $rules = Rule::all();
        return view('admin.rulesManagement.index',compact('rules'));
    }

    public function create()
    {
        //
        return view('admin.rulesManagement.add');
    }


    public function store(RuleRequest $request)
    {
        //
        $data = [
            'title' => $request->title,
            'description' => $request->description
        ];

        Rule::create($data);

        session()->flash('message', 'قانون جدید با موقیت ایجاد گردید.');

        return redirect()->route('rules.index');
    }

    public function show($id)
    {
        //
        $rule =Rule::findOrFail($id);
        return view('admin.rulesManagement.show',compact('rule'));

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
        $rule = Rule::destroy($id);
        session()->flash('message', 'قانون با موفقیت حذف گردید.');

        return redirect()->route('rules.index');

    }
}
