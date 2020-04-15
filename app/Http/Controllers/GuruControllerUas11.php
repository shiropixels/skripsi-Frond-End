<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Siswa_Uas_11;
use App\siswa_temp_uas_11;
class GuruControllerUas11 extends Controller
{
    function indexUas11()
    {
    	$data = siswa_temp_uas_11::all();
    	return view('GuruUas11',compact('data'));
    }

    function downloadDataUas11($type)
    {
    	$data=siswa_temp_uas_11::get()->toArray();
    	return Excel::create('nilaiSiswaKelas11Uas',function($excel)use($data){
    		$excel->sheet('mysheet',function($sheet)use($data)
    		{
    			$sheet->fromArray($data);
    		});

    	})->download($type);
    }
    function importUas11(Request $request)
    {
    	siswa_temp_uas_11::truncate();
    	$this->validate($request,['select_file'=>'required|mimes:xls,xlsx']);
    	$path = $request->file('select_file')->getRealPath();
    	$data = Excel::load($path)->get();
    	if($data->count() > 0)
    	{
    		foreach($data as $row)
    		{
    			$insert_data[] = array(
    				'nama'=> $row['nama'],
    				'nis' => $row['nis'],
    				'nilai' => $row['nilai']
    			);
    		}

    		if(!empty($insert_data))
    		{
    			DB::table('siswa_11_uas')->insert($insert_data);
    			DB::table('siswa_11_uas_temp')->insert($insert_data);
    		}
    	}

    	return back()->with('success','Excel Data Imported Successfully');
    }

}
