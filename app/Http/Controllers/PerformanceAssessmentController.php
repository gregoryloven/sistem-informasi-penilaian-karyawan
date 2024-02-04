<?php

namespace App\Http\Controllers;

use App\Models\PerformanceAssessment;
use App\Models\Employee;
use Illuminate\Http\Request;
use Auth;

class PerformanceAssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $data = PerformanceAssessment::all();
        $employee = Employee::all();
        $user = Auth::user()->type;

        return view('performance.index', compact('data','employee','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = new PerformanceAssessment();
        $data->employee_id = $request->employee_id;
        $data->pelayanan = $request->pelayanan;
        $data->kebersihan = $request->kebersihan;
        $data->kerjasama = $request->kerjasama;
        $data->kedisiplinan = $request->kedisiplinan;
        $data->pengetahuan_produk = $request->pengetahuan_produk;
        $data->komunikasi = $request->komunikasi;
        $data->average = $request->rata_rata;
        $data->save();

        return redirect()->route('performance.index')->withToastSuccess('Data penilaian berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PerformanceAssessment  $performanceAssessment
     * @return \Illuminate\Http\Response
     */
    public function show(PerformanceAssessment $performanceAssessment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PerformanceAssessment  $performanceAssessment
     * @return \Illuminate\Http\Response
     */
    public function edit(PerformanceAssessment $performanceAssessment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PerformanceAssessment  $performanceAssessment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerformanceAssessment $performanceAssessment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PerformanceAssessment  $performanceAssessment
     * @return \Illuminate\Http\Response
     */
    public function destroy(PerformanceAssessment $performanceAssessment)
    {
        try {
            $performanceAssessment->delete();
            return redirect()->route('performance.index')->withToastSuccess('Data penilaian berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('performance.index')->withToastError('Data penilaian gagal dihapus karena digunakan pada data lain');
        }
    }

}
