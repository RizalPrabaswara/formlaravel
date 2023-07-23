<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use Illuminate\Http\Request;

class KotaDropdownController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $negara = Countries::findOrFail($request->id);
        $kotaFiltered = $negara->cities->pluck('name', 'id');
        return response()->json($kotaFiltered);
    }
}
