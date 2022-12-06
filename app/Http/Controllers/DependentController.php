<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependent;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use DataTables;

class DependentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kabupatens = Kabupaten::get();
        $provinsis = Provinsi::get();
        $Dependents = Dependent::with('DataProvinsi','DataKabupaten')->get();
        if ($request->ajax()) {
            $allData = DataTables::of($Dependents)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' .
                        $row->id . '"  class=" text-white btn btn-primary btn-sm " id="edit"><i class="bi bi-pencil-square"></i></a>&nbsp';
                    $btn.= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' .
                        $row->id . '"  class=" text-white btn btn-danger btn-sm " id="delete"><i class="bi bi-trash"></i></a>';
                    return  $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            return $allData;
        }
        $content = [
            'Dependents' => $Dependents,
            'kabupatens' => $kabupatens,
            'provinsis' => $provinsis,
        ];
        return view('Dependent.index', $content);
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
        $Dependents= Dependent::create(
            [
                'nama' => $request->nama,
                'id_provinsi' => $request->id_provinsi,
                'id_kabupaten' => $request->id_kabupaten,
            ],
        );
            return response()->json([
                'success' => true,
            ]);
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
        $Dependents = Dependent::find($id);

        return response()->json($Dependents);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
             Dependent::updateOrCreate(
                [
                    'id'=>$request->id_dependent
                ],
                [
                    'nama' => $request->nama,
                    'id_provinsi' => $request->id_provinsi,
                    'id_kabupaten' => $request->id_kabupaten,
                ],
            );
        return response()->json(['success' => 'Data delete successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dependent::find($id)->delete();
        return response()->json(['success' => 'Data delete successfully']);
    }
}
