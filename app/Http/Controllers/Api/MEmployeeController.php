<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\MEmployee;
use App\Http\Controllers\Controller;

class MEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mEmployee = MEmployee::all();
        return $mEmployee;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new MEmployee;
        $employee->emp_id = $request->empId;
        $employee->emp_name = $request->empName;
        $employee->sex = $request->sex;
        $employee->service_code = $request->serviceCode;
        $employee->save();
        return redirect('api/m_employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = MEmployee::find($id);
        return $employee;
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
        $employee = MEmployee::find($id);
        $employee->emp_name = $request->empName;
        $employee->sex = $request->sex;
        $employee->service_code = $request->serviceCode;
        $employee->save();
        return redirect('api/m_employee/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = MEmployee::find($id);
        $employee->delete();
        return redirect('api/m_employee/');
    }
}
