<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('peserta.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peserta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat_email' => 'required|email',
            'nomor_telp' => 'required',
            'alamat' => 'required',
        ]);

        $data = Peserta::create([
            'nama' => $request->nama,
            'alamat_email' => $request->alamat_email,
            'nomor_telp' => $request->nomor_telp,
            'alamat' => $request->alamat,
        ]);

        return redirect(route('peserta.index'));
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
        $peserta = Peserta::findOrFail($id);
        return view('peserta.edit', compact('peserta'));
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
        // dd($request);
        $peserta = Peserta::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'alamat_email' => 'required|email',
            'nomor_telp' => 'required',
            'alamat' => 'required',
        ]);

        $peserta->update([
            'nama' => $request->nama,
            'alamat_email' => $request->alamat_email,
            'nomor_telp' => $request->nomor_telp,
            'alamat' => $request->alamat,
        ]);

        return redirect(route('peserta.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();

        return redirect(route('peserta.index'));
    }

    public function exportToWord($pesertaId)
    {
        $peserta = Peserta::findOrFail($pesertaId);

        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $section = $phpWord->addSection();
        $phpWord->addParagraphStyle('centers', array('align'=>'center', 'bold' => true, 'size' => 18));
        $section->addText('Data Peserta','' ,'centers');
        $section->addText('Nama : ' . $peserta->nama);
        $section->addText('Email : ' . $peserta->alamat_email);
        $section->addText('Nomor Telepon : ' . $peserta->nomor_telp);
        $section->addText('Alamat : ' . $peserta->alamat);


        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objWriter->save(storage_path('Data Peserta.docx'));
        } catch (Exception $e) {

        }


        return response()->download(storage_path('Data Peserta.docx'));
    }
}
