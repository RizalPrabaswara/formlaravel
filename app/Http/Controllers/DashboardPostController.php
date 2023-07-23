<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Countries;
use App\Models\District;
use App\Models\Jabatan;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    protected $user;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.users.index', [
            'users' => User::all(),
        ]);
    }

    // public function addSkills(Request $request, User $user)
    // {
    //     $user->skills()->attach($request->skills);

    //     return 'Attached';
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create', [
            'jabatans' => Jabatan::all(),
            'skills' => Skill::all(),
            'countries' => Countries::all(),
            'cities' => Cities::all(),
            'districts' => District::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        //ddd($request->skill);
        $validatedData = $request->validate([
            'jobs_id' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'phone' => 'required',
            'year' => 'required',
            'countries_id' => 'required',
            'cities_id' => 'required',
            'districts_id' => 'required',
            'skill' => 'required',
            'image' => 'image|file|max:5384',
            'deskripsi' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        $validatedData['password'] = bcrypt($request->password);
        $validatedData['skill'] = json_encode($request->skill);
        $validatedData['created_by'] = $user->creator;
        // $skill = $request->getVar('skill[]');
        // $js_encode = json_encode($skill);
        User::create($validatedData)->skills()->attach($request->skill);
        //$user->skills()->attach($request->skill,$request->id);

        return redirect('/dashboard/users')->with('success', 'User Baru Telah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Skill $skill)
    {
        //return $user;
        return view('dashboard.users.show', [
            'user' => $user,
            // 'skill' => $skill,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user' => $user,
            'jabatans' => Jabatan::all(),
            'skills' => Skill::all(),
            'countries' => Countries::all(),
            'cities' => Cities::all(),
            'districts' => District::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //ddd($request->skill);
        $rules = [
            'jobs_id' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'phone' => 'required',
            'year' => 'required',
            'countries_id' => 'required',
            'cities_id' => 'required',
            'districts_id' => 'required',
            'skill' => 'required',
            'image' => 'image|file|max:5384',
            'deskripsi' => 'required',
        ];

        $validatedData =  $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        $validatedData['password'] = bcrypt($request->password);
        $validatedData['skill'] = json_encode($request->skill);

        User::where('id', $user->id)
            ->update($validatedData);
        //$user->skills()->syncWithoutDetaching($request->skill);
        $user->skills()->sync($request->skill);

        return redirect('/dashboard/users')->with('success', 'User Telah Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->image) {
            Storage::delete($user->image);
        }
        User::destroy($user->id);
        return redirect('/dashboard/users')->with('success', 'User Telah Berhasil Dihapus!');
    }
}
