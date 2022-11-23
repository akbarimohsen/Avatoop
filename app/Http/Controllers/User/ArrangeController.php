<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Arrange;
use App\Models\Schematic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArrangeController extends Controller
{
    public function index()
    {
        $user = Auth::user()->arranges()->get(['id', 'schematic_id', 'players']);
        return response()->json([
            'arrange' => $user
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'schmatic_id',
            'players'
        ]);
        $user = Auth::user();

        $arrange = Arrange::where('user_id', $user->id)->update([
             'schematic_id' => $request->schematic,
             'players' => $request->players,
        ]);
        return response()->json([
            'MSG' => 'ترکیب شما با موفقیت ایجاد شد!'
        ]);
    }

    public function showAll()
    {
        $schematic = Schematic::all();
        return response()->json([
           'schematic' => $schematic
        ]);
    }
}
