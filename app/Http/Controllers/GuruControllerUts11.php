<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\SiswaUts11;
use App\siswa_temp_uts_11;
class GuruControllerUts11 extends Controller
{
    function indexUts11()
    {

    	$data = siswa_temp_uts_11::all();


    	return view('GuruUts11',compact($data));

    }

    function downloadDataUts11($type)
    {
    	$data = siswa_temp_uts_11::get()->toArray();
    	return Excel::create('nilaiSiswaKelas11Uts',function($excel)use($data){
    		$excel->sheet('mySheet',function($sheet)use($data){
    			$sheet->fromArray($data);
    		});
    	})->download($type);
    }

    function importUts11(Request $request)
    {
    	siswa_temp_uts_11::truncate();
    	$this->validate($request,['select_file'=>'required|mimes:xls,xlsx'
    ]);
    	$path = $request->file('select_file')->getRealPath();
        $data = Excel::load($path)->get();

        if($data->count() > 0)
        {
        	foreach($data as $row)
        	{
        		$insert_data[] = array(
        			'nama' => $row['nama'],
        			'nis' => $row['nis'],
        			'nilai' => $row['nilai']



        		);
        	}
        	if(!empty($insert_data))
        	{
        		DB::table('siswauts11')->insert($insert_data);
        		DB::table('siswa_temp_uts11')->insert($insert_data);

        	}

        	

        }	return back()->with('success','Excel Data Imported Successfully');

    }
}
