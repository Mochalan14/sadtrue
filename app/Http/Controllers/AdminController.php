<?php

namespace App\Http\Controllers;

use App\Models\Caption;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $jumlahCaption = count(Caption::all());
        $jumlahPengguna = count(User::all());

        return view('admin.index',compact(['jumlahCaption','jumlahPengguna']));
    }

    public function caption(){

        $dataCaption = Caption::all();
        return view('admin.caption',compact(['dataCaption']));
    }

    public function add(){
        return view('admin.caption.add');
    }

    public function store(Request $request){

        $data = $request->input();
        $this->validate($request,[
            'input_caption' => 'required'
        ]);
        Caption::create([
            'user_id' => $data['input_penulis'],
            'caption' => $data['input_caption']
        ]);
        return redirect()->route('admin.caption')->with('success','Data Berhasil ditambahkan');
    }

    public function captionedit($id){ 
        $dataCaption = Caption::where('id',$id)->get();
        return view('admin.caption.edit',compact(['dataCaption']));
    }

    public function captionupdate(Request $request)
    {
        // update data pegawai
        $this->validate($request,[
            'input_caption' => 'required'
        ]);
        Caption::where('id',$request->input_id)->update([
            'caption' => $request->input_caption
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect()->route('admin.caption')->with('success','Data Berhasil diupdate');
    }

    public function captiondelete($id){
        Caption::where('id',$id)->delete();
        return redirect()->route('admin.caption')->with('success','Data Berhasil dihapus');
    }
}
