<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::all();

        return view('role.index', compact('data'));
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
        $data = new Role();
        $data->nama = $request->nama;
        $data->save();

        return redirect()->route('role.index')->withToastSuccess('Data jabatan berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('role.index')->withToastSuccess('Data jabatan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        try {
            $role->delete();
            return redirect()->route('role.index')->withToastSuccess('Data jabatan berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('role.index')->withToastError('Data jabatan gagal dihapus karena digunakan pada data lain');
        }
    }

    public function EditForm(Request $request)
    {
        $id = $request->get("id");
        $data = Role::find($id);

        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('role.EditForm',compact('data'))->render()),200);
    }
}
