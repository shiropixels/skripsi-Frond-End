<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Deskripsi_Siswa_10;
use App\Deskripsi_Siswa_10_temp;

class GuruControllerDeskripsiSiswa10 extends Controller
{
	function indexSikap10()
	{
		$data = Deskripsi_Siswa_10_temp::all();
		return view('SikapSiswaKelas10',compact('data'));
	}

	function importSikap10(Request $request)
	{
		Deskripsi_Siswa_10_temp::truncate();
		$this->validate($request,['select_file'=>'required|mimes:xls,xlsx']);
		$path = $request->file('select_file')->getRealPath();
		$data = Excel::load($path)->get();
		if($data->count() > 0 )
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
				DB::table('deskripsi_siswa_10')->insert($insert_data);
				DB::table('deskripsi_siswa_10_temp')->insert($insert_data);
			}
		}

		return back()->with('success','data Telah sikap siswa sudah dimasukan');

	}
}
