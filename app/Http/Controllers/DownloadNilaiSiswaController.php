<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class DownloadNilaiSiswaController extends Controller
{
    public function view_pdf()
    {
        // Ambil data siswa dari database
        $students = Student::all();

        // Load view dengan data
        $pdf = Pdf::loadView('nilai-siswa');

        // Untuk menampilkan di browser (bukan download otomatis)
        return $pdf->stream('surat_hasil_belajar.pdf');

        // Jika ingin langsung download, gunakan:
        // return $pdf->download('surat_hasil_belajar.pdf');
    }
}
