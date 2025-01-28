<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;

class CVController extends Controller
{
    public function getCV()
    {
        $cv = CV::first();
        return response()->json($cv);
    }

    public function updateCV(Request $request)
    {
        $cv = CV::first();
        $cv->update($request->all());
        return response()->json(['success' => true]);
    }
}