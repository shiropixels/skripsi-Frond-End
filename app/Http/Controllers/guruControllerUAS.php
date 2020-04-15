<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB;
use Excel;
Use App\SiswaUas;
use App\siswa_temp_uas;
class guruControllerUAS extends Controller
{
    function indexUas()
    {
    	$data = siswa_temp_uas::all();
    	
    	
    	return view('GuruUas10',compact('data'));
    }

    function downloadDataUas($type)
    {
            
        
        $data = siswa_temp_uas::get()->toArray();
        return Excel::create('nilaiSiswaKelas10Uas',function($excel) use($data){
            $excel->sheet('mySheet',function($sheet)use($data){
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    function importUas(Request $request)
    {
        siswa_temp_uas::truncate();
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
    			DB::table('siswa_10_uas')->insert($insert_data);
                DB::table('siswa_10_uas_temp')->insert($insert_data);
    		}

    	}
    	return back()->with('success','Excel  Data Imported Successfulyy');
    }

}
