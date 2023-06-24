<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Presence;
use App\Models\Salary;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class ListMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/member/index',[
            'member' => User::all(),
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
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = "";
        $request->role_id == 1 ?  $role = 1 : $role = 0;
        User::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            'is_admin' => $role,
            'email' => $request->email
        ]);
        $role = role::find($request->role_id);
        $a = User::latest()->get();


        Presence::create([
            'user_id' => $a[0]->id,
            'jabatan' => $role->nama_jabatan
        ]);
        

        // Salary::create([
        //     'user_id' => $a[0]->id,
        //     'gaji_pokok' => $role->gaji_pokok,
        //     'total' => $role->gaji_pokok,
        //     'jabatan' => $role->nama_jabatan
        // ]);
        return redirect('/list-member')->with('succes','berhasil');

        //create kehadiran 
    }

    public function generate ($id)
    {
        $data = User::findOrFail($id);
        $qrcode = QrCode::size(400)->generate($data->id);
        return view('admin/member/qrcode',compact('qrcode','data'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        Salary::where('user_id',$id)->delete();
        User::destroy($id);
        return redirect('/list-member')->with('succes','berhasil');


        //delete presence daily
    }
}
