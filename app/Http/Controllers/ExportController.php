<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CategorizedValue;

class ExportController extends Controller
{
    public function index()
    {
        return view('export');
    }
    
    public function export()
    {
        $user = Auth::user();
        $sessions = CategorizedValue::where('user_id', $user->id)
                        ->orderBy('created_at', 'desc')
                        ->get();

        return response()->json($sessions);
    }
}
