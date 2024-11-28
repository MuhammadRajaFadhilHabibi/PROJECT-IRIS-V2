<?php

use App\Http\Controllers\AkademikController;
use Monolog\Registry;
use App\Http\Middleware\RegistFirst;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IrsController;
use App\Http\Controllers\KhsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AjuanRuangController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\BuatIrsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DigitalSignatureController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

// Dashboard Role
Route::get('dashboard', function () {
    if (auth()->user()->mhs == 1) {
        return app('App\Http\Controllers\DashboardController')->index();
    } else if (auth()->user()->ba == 1) {
        return app('App\Http\Controllers\RuangController')->dashboard();
    } else if (auth()->user()->dk == 1) {
        return view('dkDashboard');
    } else if (auth()->user()->kp == 1) {
        return view('kpDashboard');
    } else if (auth()->user()->pa == 1) {
        return view('paDashboard');
    }

})->name('dashboard')->middleware('auth');


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('product/{product}/delete',[ProductsController::class,'destroy']);

Route::get('/maintenance', function () {
    return view('maintenance');
});
Route::get('/tes', function () {
    return view('tes');
});


//mahasiswa
Route::get('/mhsBuatIrs', function () {
    return view('mhsBuatIrs');
});

Route::get('/mhsAkademik', function () {
    return view('mhsAkademik');
});

Route::get('/mhsBuatIrs', [BuatIrsController::class, 'index'])->name('mhsBuatIrs');

Route::get('/mhsAkademik', [AkademikController::class, 'index'])->name('mhsAkademik');

Route::get('/mhsDashboard', [DashboardController::class, 'index'])->name('mhsDashboard');

Route::get('/mhsRegistrasi', [RegisterController::class, 'index'])->name('mhsRegistrasi');




//IRS
Route::get('/irs', [IrsController::class, 'all'])->name('irs');
Route::get('/irs/{id}/{email}', [IrsController::class, 'index']);


//KHS
Route::get('/khs', [KhsController::class, 'all'])->name('khs');
Route::get('/khs/{id}', [KhsController::class, 'index']);


//Transkrip
Route::get('m/transkrip', function () {
    return view('mhsTranskrip');
})->name('transkrip');
Route::get('m/make-irs', function () {
    return view('mhsBuatIrs');
})->name('transkrip');

//Buat IRS
Route::get('/buat-irs', [BuatIrsController::class, 'index'])->name('buat-irs')->middleware([RegistFirst::class]);
Route::post('/buat-irstest', [BuatIrsController::class, 'createIrs'])->name('buat-irstest');
Route::post('/viewirs', [BuatIrsController::class, 'viewIrs'])->name('viewirs');
Route::post('/deleteirs', [BuatIrsController::class, 'deleteIrs'])->name('deleteirs');

Route::get('/ajuanIrs', [BuatIrsController::class, 'index2'])->name('ajuanIrs');
Route::post('/irs/approve', [BuatIrsController::class, 'approve'])->name('irs.approve');
Route::post('/irs/reject', [BuatIrsController::class, 'reject'])->name('irs.reject');

//Registrasi
Route::get('mhsRegistrasi', function () {
    return view('mhsRegistrasi');
})->name('mhsRegistrasi');


//Ruang --Bagian Akademik
Route::resource('/ruang', RuangController::class)->names([
    'index' => 'ruang',
]);
Route::get('/plotruang', [RuangController::class, 'index2'])->name('plotruang');
Route::post('/plotruang/{id}', [RuangController::class, 'editProdi']);
Route::get('/prodi', [RuangController::class, 'plotProdi']);

Route::get('/ajuanRuang', [RuangController::class, 'index3'])->name('ajuanruang');
Route::post('/ruang/{id}/update-status', [RuangController::class, 'updateStatus'])->name('ruang.updateStatus');

Route::post('/update-status-ruang/{id}', [RuangController::class, 'updateStatus'])->name('update.status');



//Jadwal
Route::get('/buatjadwal', [JadwalController::class, 'index'])->name('buatjadwal');
Route::post('/buatjadwal/{id}', [JadwalController::class, 'update']);
Route::post('/checkjadwal', [JadwalController::class, 'isJadwalExist']);


Route::get('/ajuanJadwal', [JadwalController::class, 'index3'])->name('ajuanjadwal');
Route::post('/jadwal/approve', [JadwalController::class, 'approve'])->name('jadwal.approve');
Route::post('/jadwal/reject', [JadwalController::class, 'reject'])->name('jadwal.reject');

//Perwalian
// Route untuk menampilkan daftar mahasiswa (dengan controller IrsController)
Route::get('/daftarmahasiswa', [IrsController::class, 'indexMahasiswa'])->name('daftarmahasiswa');

// Route untuk halaman IRS
Route::get('p/halamanIRS/{id}', function ($id) {
    // Ambil data mahasiswa berdasarkan ID
    $mahasiswa = Mahasiswa::find($id);

    $matakuliah = Matakuliah::all();

    // Kirim data mahasiswa ke halaman IRS
    return view('paHalamanIRS', compact('mahasiswa', 'matakuliah'));
})->name('halamanIRS');

// Daftar Mahasiswa PA
Route::get('/paHalamanIRS/{id}', [IrsController::class, 'show'])->name('paHalamanIRS');
Route::post('/irs/save', [IrsController::class, 'save'])->name('irs.save');

// Route untuk mengubah status
Route::post('p/irs/{id}/approve', function ($id) {
    $mahasiswa = Mahasiswa::findOrFail($id);
    if ($mahasiswa->jadwal) {
        $mahasiswa->jadwal->status = 'Disetujui';
        $mahasiswa->jadwal->save();
    }
    return redirect()->route('daftarmahasiswa');
});

// Route untuk upload Tanda Tangan IRS
Route::post('/upload-irs', function (Request $request) {
    foreach ($request->file('file') as $file) {
        $filename = $file->getClientOriginalName();
        $file->storeAs('irs_files', $filename, 'public');
    }
    return response()->json(['success' => true]);
});

// Route untuk melihat IRS
Route::get('/view-irs/{name}', function ($name) {
    $filePath = storage_path("app/public/irs_files/{$name}.pdf");

    if (file_exists($filePath)) {
        return response()->file($filePath);
    }

    abort(404, 'File tidak ditemukan');
});

// Route lainnya untuk IRS
Route::get('/irs/{id}', [IrsController::class, 'show'])->name('irs.show');
Route::post('irs/update-status/{id}', [IrsController::class, 'updateStatus'])->name('update-status-irs');
Route::get('/paHalamanIRS/{id}', [IrsController::class, 'show'])->name('paHalamanIRS');

// Menyetujui/Menolak IRS
Route::put('/update-status/{id}', [IrsController::class, 'updateStatus'])->name('update-status');
Route::get('/reset-status/{id}', [IrsController::class, 'resetStatus'])->name('reset-status');


Route::resource('/matakuliah', MatakuliahController::class)->names([
    'index' => 'matakuliah',
]);


Route::get('k/rombel', function () {
    return view('kpRombel');
})->name('rombel');


Route::get('/reviewjadwal', [JadwalController::class, 'index2']);
Route::get('/reviewjadwal/{prodi}', [JadwalController::class, 'reviewJadwalProdi']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');


Route::put('/ruang/{id}', [RuangController::class, 'update'])->name('ruang.update');

Route::delete('/plotruang/{id}', [RuangController::class, 'destroy'])->name('plotruang.destroy');
Route::delete('/pembuatan-ruang/{id}', [RuangController::class, 'destroyruang'])->name('ruang.destroyruang');

Route::post('/ruang', [RuangController::class, 'store'])->name('ruang.store');

// Dashboard PA


// Ajuan PA
Route::get('/paAjuanIRS', [IrsController::class, 'getMahasiswa'])->name('paAjuanIRS');
Route::get('/paAjuanIRS/{id}', [IRSController::class, 'show'])->name('paAjuanIRS');
Route::get('/mahasiswa/{id}', [IrsController::class, 'show'])->name('mahasiswa.show');


// Route digital signature
Route::get('/digital-signature/{irs_id}/generate', [DigitalSignatureController::class, 'generate']);
Route::post('/digital-signature/verify', [DigitalSignatureController::class, 'verify']); // route untuk verifikasi