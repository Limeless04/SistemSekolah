<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Headmaster;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create1(Request $request)
    {
        $data = $request->session()->get('dataSekolah');
        return view('home.daftar',compact('data'));
    }

    public function create2(Request $request)
    {
        $data = $request->session()->get('dataSekolah');
        return view('home.daftar2',compact('data'));
    }
    public function create3(Request $request)
    {
        $data = $request->session()->get('dataSekolah');
        return view('home.daftar3',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store1(Request $request)
    {
        $validatedData = $request->validate([
            'nama_sekolah' =>'required',
            'alamat_sekolah' => 'required',
            'npsn'=>'required',
            'jenjang'=> 'required'
        ]);

        if(empty($request->session()->get('dataSekolah'))){
            $headmaster = new Headmaster();
            $headmaster->fill($validatedData);
            $request->session()->put('dataSekolah', $headmaster);
        }else{
            $headmaster = $request->session()->get('dataSekolah');
            $headmaster->fill($validatedData);
            $request->session()->put('dataSekolah', $headmaster);
        }

        return redirect('/create2');

    }

    public function store2(Request $request)
    {
        $validatedData = $request->validate([
            'nama' =>'required',
            'id_kepsek' =>'required',
            'no_hp' => 'required',
            'email'=>'required',
        ]);

        if(empty($request->session()->get('dataSekolah'))){
            $headmaster = new Headmaster();
            $headmaster->fill($validatedData);
            $request->session()->put('dataSekolah', $headmaster);
        }else{
            $headmaster = $request->session()->get('dataSekolah');
            $headmaster->fill($validatedData);
            $request->session()->put('dataSekolah', $headmaster);
        }

        return redirect('/create3');

    }

    public function store3(Request $request)
    {
        $validatedData = $request->validate([
            'nama_sekolah' =>'required',
            'alamat_sekolah' => 'required',
            'npsn'=>'required',
            'jenjang'=> 'required',
            'nama' =>'required',
            'id_kepsek' =>'required',
            'no_hp' => 'required',
            'email'=>'required',
            'password' => 'required|min:6',
            'c_password' => 'required|same:password'
        ]);
        Headmaster::create([
                 'nama_sekolah'=>$request->nama_sekolah,
                 'alamat_sekolah'=>$request->alamat_sekolah,
                 'npsn'=>$request->npsn,
                 'jenjang'=>$request->jenjang,
                 'nama'=>$request->nama,
                 'id_kepsek'=>$request->id_kepsek,
                 'no_hp'=>$request->no_hp,
                 'email'=>$request->email,
                 'password'=>$request->password,
             ]);
        return redirect('/')->with('status','Data Ditambahkan!');
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
        //
    }
}
