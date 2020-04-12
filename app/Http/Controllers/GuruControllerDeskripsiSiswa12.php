<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Deskripsi_Siswa_12;
use App\Deskripsi_Siswa_12_temp;
class GuruControllerDeskripsiSiswa12 extends Controller
{
	function indexSikap12()
	{

		$data = Deskripsi_Siswa_12_temp::all();
		return view('SikapSiswaKelas12',compact('data'));
	}

	function importSikap12(Request $request)
	{
		Deskripsi_Siswa_12_temp::truncate();
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
				DB::table('deskripsi_siswa_12')->insert($insert_data);
				DB::table('deskripsi_siswa_12_temp')->insert($insert_data);
			}
		}
		return back()->with('success','data sikap siswa telah dimasukan');
	}
}
