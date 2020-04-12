<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Deskripsi_Siswa_11;
use App\Deskripsi_Siswa_11_temp;
class GuruControllerDeskripsiSiswa11 extends Controller
{
    function indexSikap11()
    {
    	$data = Deskripsi_Siswa_11_temp::all();
    	return view('SikapSiswaKelas11',compact('data'));
    }

    function importSikap11(Request $request)
    {
    	Deskripsi_Siswa_11_temp::truncate();
    	$this->validate($request,['select_file'=>'required|mimes:xls,xlsx']);
    	$path = $request->file('select_file')->getRealPath();
    	$data = Excel::load($path)->get();
    	if($data->count() > 0)
    	{
    		foreach($data as $row)
    		{
    			$insert_data[] = array(
    				'no' => $row['no'],
    				'matapelajaran' => $row['matapelajaran'],
    				'kompetensi' => $row['kompetensi'],
    				'catatan' => $row['catatan']
    			);
    		}
    		if(!empty($insert_data))
    		{
    			DB::table('deskripsi_siswa_11')->insert($insert_data);
    			DB::table('deskripsi_siswa_11_temp')->insert($insert_data);
    		}
    	}
    	return back()->with('success','data sikap siswa telah dimasukan ');
    }
}
