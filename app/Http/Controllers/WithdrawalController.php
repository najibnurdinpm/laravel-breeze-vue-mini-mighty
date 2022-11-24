<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class WithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Withdrawal/Withdrawal');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Withdrawal/ApproveWithdrawal');
        // return Inertia::render('Collection/EditCollection');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $new_arr = [];
        $arr_dummy = [
            [
                "id" => 0,
                "nama" => 'Nurdin Najib',
                "Rekening" => 32323223232,
                "Nominal" => 300000,
                "data_request" =>  '23-11-2022',
                "status" => 0,
                "color_info" => 'yellow',
            ],
            [
                "id" => 1,
                "nama" => 'Yusuf Azmi',
                "Rekening" => 134343434,
                "Nominal" => 200000,
                "data_request" =>  '22-11-2022',
                "status" => 0,
                "color_info" => 'greeen',
            ],
            [
                "id" => 2,
                "nama" => 'Kembar',
                "Rekening" => 5343434343,
                "Nominal" => 100000,
                "data_request" =>  '21-11-2022',
                "status" => 0,
                "color_info" => 'red',
            ],
        ];


        if($request->is_checked) {
            $request->session()->put('request',['id_checked' => $request->is_checked, 'param_page' => $request->page]);
        }
        
        foreach ($request->session()->get('request')['id_checked'] as $key => $value) {
            $new_arr[$key] = $arr_dummy[$value];
        }
        
        
        $page = ($request->session()->get('request')['param_page']) ? 'Withdrawal/ApproveWithdrawal' : 'Withdrawal/RejectWithdrawal' ;

        return Inertia::render($page, [
            'data' => $new_arr
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
        //
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

        if($request->is_approve) {
            dd($request->is_approve, $request->is_checked);
            // do something approve
        } else {
            dd($request->is_approve, $request->is_checked);
            // do something rejected
        }

        return redirect('/withdrawal');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
