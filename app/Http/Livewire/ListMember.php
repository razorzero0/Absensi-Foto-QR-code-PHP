<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Member;
class ListMember extends Component
{
    public $nama,$jenis_kelamin, $alamat, $password;
    public function render()
    {
        return view('livewire.list-member');
    }

    public function create(){
        Member::create([
            'nama' => $this->nama,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
            'password' => $this->password
        ]);
    }
}
