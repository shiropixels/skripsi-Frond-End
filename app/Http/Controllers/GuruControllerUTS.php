<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use DB;
use Excel;
use App\Siswa;
use App\siswa_temp;
class GuruControllerUts extends Controller
{
	  function indexUts()
    {
    	$data = siswa_temp::all();
    	
    	
    	return view('GuruUts10',compact('data'));
    }
     
     function downloadDataUts($type)
     {
     	$data = siswa_temp::get()->toArray();
     	return Excel::create('nilaiSiswaKelas10Uts',function($excel) use($data){
     		$excel->sheet('mySheet',function($sheet)use($data){
     			$sheet->fromArray($data);

     		});

     	})->download($type);
     }
 
	function importUts(Request $request)
	{
		siswa_temp::truncate();
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
				DB::table('siswa')->insert($insert_data);
				DB::table('siswa_temp')->insert($insert_data);
			}
		}
		return back()->with('success','Excel Data Imported Successfully');
	}
        

}