<?php

namespace App\Http\Controllers;

use App\Models\Jual;
use App\Models\Post;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;



class JualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $total = Jual::count();

        return view('dashboard.jual.index', [
            'jual' => Jual::All(),
            'posts' => Post::All()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $jual = Jual::all();
        $cek = Post::all();

        $pdf = PDF::loadview('dashboard.jual.cetak', ['jual' => $jual])->setpaper('A4', 'landscape');
        return $pdf->stream('nota-pesanan.pdf');

        // return Excel::download(new UsersExport, 'users.xlsx');

    }


    public function export()
    {
        return Excel::download(new UsersExport, 'data.xlsx');

    }







    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Jual $jual)
    {

        $validatedData = $request->validate([
            'kode_barang' => 'required|max:255',
            'nama_barang' => 'required|max:255',
            'harga_barang' => 'required|max:255',
            'jumlah_barang' => 'required|max:255',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['total_harga'] = $request->harga_barang * $request->jumlah_barang;

        Jual::create($validatedData);



        return redirect('/dashboard/jual')->with('success', 'Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jual  $jual
     * @return \Illuminate\Http\Response
     */
    public function show(Jual $jual)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jual  $jual
     * @return \Illuminate\Http\Response
     */
    public function edit(Jual $jual)
    {
        return view('dashboard.jual.edit', [
            'jual' => $jual,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jual  $jual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jual $jual)
    {
        $rules = [
            'kode_barang' => 'required|max:255',
            'nama_barang' => 'required|max:255',
            'harga_barang' => 'required|max:255',
            'jumlah_barang' => 'required|max:255',
        ];

        // if ($request->id != $jual->id) {
        //     $rules['id'] = 'required|unique:juals';
        // }

        $validatedData = $request->validate($rules);
        $validatedData['total_harga'] = $request->harga_barang * $request->jumlah_barang;
        Jual::where('id', $jual->id)->update($validatedData);

        return redirect('/dashboard/jual')->with('success', 'Pesanan has been Updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jual  $jual
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jual $jual)
    {
        Jual::destroy($jual->id);

        return redirect('/dashboard/jual')->with('success', 'Pesanan has been deleted!');
    }
}