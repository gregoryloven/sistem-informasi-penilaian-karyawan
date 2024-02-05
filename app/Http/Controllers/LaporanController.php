<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerformanceAssessment;
use Illuminate\Support\Carbon;

class LaporanController extends Controller
{
    public function laporanHarian(Request $request)
    {
        return view('laporan.harian');
    }

    public function searchByDate(Request $request)
    {
        // Ambil tanggal yang dipilih dari request
        $selectedDate = $request->input('selected_date');
    
        // Konversi format tanggal jika diperlukan
        $selectedDate = Carbon::createFromFormat('Y-m-d', $selectedDate);
        $formattedDate = $selectedDate->format('d M Y');
        // Lakukan operasi pencarian berdasarkan tanggal
        $performances = PerformanceAssessment::whereDate('created_at', $selectedDate)->get();
    
        // Atau, jika Anda ingin mencari data dalam rentang tanggal tertentu, gunakan whereBetween
        // $startDate = $selectedDate->startOfDay();
        // $endDate = $selectedDate->endOfDay();
        // $performances = PerformanceAssessment::whereBetween('created_at', [$startDate, $endDate])->get();
    
        // Kembalikan atau tampilkan hasil pencarian
        return view('laporan.result_harian', compact('performances', 'formattedDate'));
    }

    public function laporanBulanan(Request $request)
    {
        return view('laporan.bulanan');
    }

    public function searchByMonth(Request $request)
    {
        $request->validate([
            'selected_month' => 'required',
        ]);

        $selectedMonth = $request->selected_month;
        $monthName = Carbon::createFromFormat('m', $selectedMonth)->format('F');

        $performances = PerformanceAssessment::whereMonth('created_at', $selectedMonth)->get();

        return view('laporan.result_bulanan', compact('performances','monthName'));
    }

}
