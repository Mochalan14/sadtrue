<?php

namespace App\Http\Controllers;

use App\Models\Caption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $captions = Caption::all();
        // foreach ($captions as $val) {
        //     $nama = $val->user->name;

        //     dd($nama);
        // };
        
        return view('user.index',compact(['captions']));
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

        return redirect()->route('home.index')->with('success','Data Berhasil ditambahkan');
    }

    public function caption(){
        $captionku = Caption::where('user_id',Auth::user()->id)->get();
        return view('user.caption',compact(['captionku']));
    }

    public function captionedit($id){ 
        $dataCaption = Caption::where('id',$id)->get();
        return view('user.caption.edit',compact(['dataCaption']));
    }

    public function captionupdate(Request $request)
    {
        $this->validate($request,[
            'input_caption' => 'required'
        ]);
        
        Caption::where('id',$request->input_id)->update([
            'caption' => $request->input_caption
        ]);
        return redirect()->route('home.caption')->with('success','Data Berhasil diupdate');
    }

    public function captiondelete($id){
        Caption::where('id',$id)->delete();
        return redirect()->route('home.caption')->with('success','Data Berhasil dihapus');
    }
}
