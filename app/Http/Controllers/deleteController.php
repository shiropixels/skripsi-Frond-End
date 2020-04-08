<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use DB;
class deleteController extends Controller
{
	public function index()
	{
		$siswa = DB::table("siswa")->get();
		return view('siswa',compact('siswa'));
	}
    public function destroy($id)
        {
        	DB::table("Siswa")->delete($id);
        	return response()->json(['success'=>"Data Siswa Berhasil Dihapus", 'tr'=>'tr_'.$id]);	
        }

        public function deleteAll(Request $request)
        {
        	$ids = $request->ids;
        	DB::table("siswa")->whereIn('id',explode(",",$ids))->delete();
        	return response()->json(['success'=>"Data Siswa Berhasil Dihapus"]);
        }

}
