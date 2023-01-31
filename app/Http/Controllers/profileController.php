<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\laporanHarianExport;
use App\Models\Daily;
use App\Models\Role;
use App\Models\User;
use App\Models\Presence;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/profile/index',[
            'user' => DB::table('users')
            ->join('roles','users.role_id', '=','roles.id')
            ->where('users.id',auth()->user()->id)->get(),
            'role' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        User::find($id)->update([
            'nama' => $request->nama,
            'role_id' => $request->role,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'email' => $request->email
        ]);
        return redirect('/profile')->with('succes','berhasil');
    }

    public function image(Request $request, $id)
    {
        $request->validate([
            'image' => 'required'
        ]);
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $a = $request->file('image')->store('profile-image');
        }
        User::find($id)->update([
            'image' => $a
        ]);
        return redirect('/profile')->with('succes','berhasil');
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
    }
}
