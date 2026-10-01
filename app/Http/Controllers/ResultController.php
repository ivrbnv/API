<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\CategorizedValue;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function index()
    {
        return view('result');
    }

    public function save(Request $request)
    {
        $data = $request->json()->all();

        CategorizedValue::create([
            'user_id' => $data['user_id'],
            'meanF0' => $data['meanF0'],
            'F0std' => $data['F0std'],
            'meanF1' => $data['meanF1'],
            'H1minusA3' => $data['H1minusA3'],
            'pauseCount' => $data['pauseCount'],
        ]);

        return response()->json([
            'received' => $data,
            'user_id' => auth()->id(),
        ]);
    }


    public function show($id)
    {
        $session = CategorizedValue::findOrFail($id);

        
        if ($session->user_id !== Auth::id()) {
            abort(403);
        }

        return view('chart', compact('session'));
    }
}
