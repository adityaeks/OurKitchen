<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $pageTitle = 'Employee List';

        // RAW SQL QUERY
        $details = DB::select('
            select *
            from details
        ');

        return view('employee.index', [
            'pageTitle' => $pageTitle,
            'details' => $details
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Employee';

        return view('employee.create', compact('pageTitle'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'namapertama' => 'required',
            'namaterakhir' => 'required',
            'Email' => 'required|email',
            'notelp' => 'required|numeric',
            'atm' => 'required|numeric',
            'alamat' => 'required',
            'detail' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // INSERT QUERY
        DB::table('details')->insert([
            'namapertama' => $request->namapertama,
            'namaterakhir' => $request->namaterakhir,
            'Email' => $request->Email,
            'notelp' => $request->notelp,
            'atm' => $request->atm,
            'alamat' => $request->alamat,
            'detail' => $request->detail,
        ]);

        return redirect()->route('employees.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Employee Detail';

        // RAW SQL QUERY
        $employee = collect(DB::select('
            select *
            from employees
            where id = ?
        ', [$id]))->first();

        return view('employee.show', compact('pageTitle', 'employee'));
    }

  public function edit($id)
{
    $detail = DB::table('details')->where('id', $id)->first();
    $detail5 = $detail->detail;

    // ...
    return view('employee.edit', compact('detail', 'detail5'));
}

    /**
     * Update the specified resource in storage.
     */

   public function update(Request $request, string $id)
{
    $messages = [
        'required' => ':Attribute harus diisi.',
        'email' => 'Isi :attribute dengan format yang benar',
        'numeric' => 'Isi :attribute dengan angka'
    ];

    $validator = Validator::make($request->all(), [
        'namapertama' => 'required',
        'namaterakhir' => 'required',
        'Email' => 'required|email',
        'notelp' => 'required|numeric',
        'atm' => 'required|numeric',
        'alamat' => 'required',
        'detail' => 'required',
    ], $messages);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput($request->all());
    }

    DB::table('details')
        ->where('id', $id)
        ->update([
            'namapertama' => $request->namapertama,
            'namaterakhir' => $request->namaterakhir,
            'Email' => $request->Email,
            'notelp' => $request->notelp,
            'atm' => $request->atm,
            'alamat' => $request->alamat,
            'detail' => $request->detail,
        ]);

    return redirect()->route('employees.index');
}

 public function destroy(string $id)
    {
        // QUERY BUILDER
        DB::table('details')
            ->where('id', $id)
            ->delete();

        return redirect()->route('employees.index');
    }
}
