<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Siswa_Uts_12;
use App\siswa_temp_uts_12;
class GuruControllerUts12 extends Controller
{
	function indexUts12()
	{
		$data = siswa_temp_uts_12::all();
		return view('GuruUts12',compact('data'));
	}

	function downloadDataUts12($type)
	{
		$data = siswa_temp_uts_12::get()->toArray();
		return Excel::create('nilaiSiswaKelas12Uts',function($excel)use($data){
			$excel->sheet('mySheet',function($sheet)use($data){
				$sheet->fromArray($data);
			});
		})->download($type);
	}
	function importUts12(Request $request)
	{
		$data = siswa_temp_uts_12::truncate();
		$this->validate($request,['select_file'=>'required|mimes:xls,xlsx']);
		$path = $request->file('select_file')->getRealPath();
		$data = Excel::load($path)->get();
		if($data->count() >0)
		{
			foreach($data as $row)
			{
				$insert_data[] = array(
					'nama' => $row['nama'],
					'nis' => $row['nis'],
					'nilai' => $row ['nilai']
				);
			}
			if(!empty($insert_data))
			{
				DB::table('siswa_12_uts')->insert($insert_data);
				DB::table('siswa_12_uts_temp')->insert($insert_data);
			}
		}
		return back()->with('success','Excel Data Imported Succesfully');

	}
}
