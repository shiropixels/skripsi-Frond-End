<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Siswa_uas_12;
use App\Siswa_temp_uas_12;
class GuruControllerUas12 extends Controller
{
  function indexUas12()
  {
  	$data = Siswa_temp_uas_12::all();
  	return view('GuruUas12',compact('data'));
  }
  function downloadDataUas12($type)
  {
  	$data = Siswa_temp_uas_12::get()->toArray();
  	return Excel::create('nilaiSiswaKelas12Uas',function($excel)use($data){
  		$excel->sheet('mySheet',function($sheet)use($data){
  			$sheet->fromArray($data);

  		});

  	})->download($type);
  }
  function importUas12(Request $request)
  {
  	$data = Siswa_temp_uas_12::truncate();
  	$this->validate($request,['select_file'=>'required|mimes:xls,xlsx']);
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
  			DB::table('siswa_12_uas')->insert($insert_data);
  			DB::table('siswa_12_uas_temp')->insert($insert_data);
  		}

  	}
  	return back()->with('success','Excel Data Imported Successfully');
  }

}
