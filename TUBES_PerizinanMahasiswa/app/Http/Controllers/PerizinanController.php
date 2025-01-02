<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\perizinan;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Mail\Mailables\Attachment;

class PerizinanController extends Controller
{
    public function perizinanmahasiswa(Request $request)
    {
        if (empty($request->nama) || empty($request->nim) || empty($request->alamat) || empty($request->tanggal) || empty($request->tempat) || empty($request->kegiatan)) {
            return redirect('/home')->with('error', 'Form tidak boleh ada yang kosong');
        }
        // return "string";
        $val_data = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'alamat' => 'required',
            'tanggal' => 'required',
            'tempat' => 'required',
            'kegiatan' => 'required',
        ]);


        $data = [
            'idUser' => session('idUser'),
            'nama' => (string) $val_data['nama'],
            'nim' => (string) $val_data['nim'],
            'alamat' => (string) $val_data['alamat'],
            'tanggal' => $val_data['tanggal'],
            'tempat' => (string) $val_data['tempat'],
            'kegiatan' => (string) $val_data['kegiatan'],
            'status' => '1',
            'idAdmin' => '0',
        ];

            $id = $request->input('id');
            if ($id) {
            } else {
                perizinan::insert($data);
            }
            return redirect('/home');
        
    }

    public function cetakperizinan($id)
    {
        $data = perizinan::where(['idPerizinan' => $id])->leftJoin('tableusers', 'tableusers.idUser', '=', 'perizinans.idAdmin')->first();
        // return view('cetakperizinan', compact('data')); 
        // Render the Blade view into HTML
        $html = view('cetakperizinan', $data)->render();

        // Initialize DOMPDF
        $dompdf = new Dompdf();

        // Set options if needed (optional)
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true); // Set to true if you want PHP inside HTML (like variables/functions)
        $dompdf->setOptions($options);

        // Load HTML content
        $dompdf->loadHtml($html);

        // (Optional) Set paper size
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF (first pass)
        $dompdf->render();

        // Output the PDF (download)
        return $dompdf->stream('cetakperizinan.pdf', ['Attachment'=>0]);
    }

    public function approveperizinan($id)
    {
        if (session('level') != '1') {
            return redirect('/home');
        }
        perizinan::where(['idPerizinan' => $id])->update(['status' => 2, 'idAdmin' => session('idUser')]);
        return redirect("/home");
    }

    public function declineperizinan($id)
    {
        if (session('level') != '1') {
            return redirect('/home');
        }
        perizinan::where(['idPerizinan' => $id])->update(['status' => 3, 'idAdmin' => session('idUser')]);
        return redirect("/home");
    }
}
