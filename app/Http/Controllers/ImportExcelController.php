<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    function index()
    {
        $data = DB::table('students')->orderBy('id', 'DESC')->get();
        return view('import_excel', compact('data'));
    }
    function import(Request $request)
    {
        
    
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('select_file')->getRealPath();
        // echo $path;exit;
        $data =  Excel::load($path)->get();
        dd($data);
     if($data->count() > 0)
     {
      foreach($data->toArray() as $key => $value)
      {
       foreach($value as $row)
       {
        $insert_data[] = array(
         'name'  => $row['name'],
         'email'   => $row['email'],
         'mobile'   => $row['mobile']
        );
       }
      }

      if(!empty($insert_data))
      {
       DB::table('students')->insert($insert_data);
      }
     }
     return back()->with('success', 'Excel Data Imported successfully.');
    
    }
}
