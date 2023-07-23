<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\Request;

class DistrictDropdownController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $district = Cities::findOrFail($request->id);
        $districtFiltered = $district->districts->pluck('name', 'id');
        return response()->json($districtFiltered);
    }
}
