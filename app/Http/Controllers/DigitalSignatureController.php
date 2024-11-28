<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DigitalSignature; // Tambahkan ini!
use Illuminate\Support\Facades\DB; // Tambahkan ini!
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use App\Models\Mahasiswa;

class DigitalSignatureController extends Controller
{
    public function generate($id)
    {
        // Ambil data mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::find($id);

        // Pastikan mahasiswa ditemukan
        if (!$mahasiswa) {
            abort(404, "Mahasiswa tidak ditemukan");
        }

        // Enkripsi data mahasiswa untuk QR Code
        $encryptedData = encrypt([
            'id' => $mahasiswa->id,
            'nim' => $mahasiswa->nim,
            'nama' => $mahasiswa->nama,
            'prodi' => $mahasiswa->prodi,
            'angkatan' => $mahasiswa->angkatan,
        ]);

        // Generate QR Code
        $qrCode = QrCode::size(300)->generate($encryptedData);

        // Generate PDF dengan data mahasiswa dan QR Code
        $pdf = PDF::loadView('digital_signature.pdf', compact('mahasiswa', 'qrCode'));

        // Kembalikan file PDF untuk diunduh
        return $pdf->download('Digital-Signature-' . $mahasiswa->nama . '.pdf');    
    }

    public function verify(Request $request)
    {
        $decryptedData = decrypt($request->input('qr_data'));

        $signature = DigitalSignature::where('irs_id', $decryptedData['id'])->first();

        if ($signature && $signature->encrypted_data === $request->input('qr_data')) {
            return response()->json(['message' => 'Valid QR Code!', 'data' => $decryptedData]);
        }

        return response()->json(['message' => 'Invalid QR Code!'], 400);
    }
}
