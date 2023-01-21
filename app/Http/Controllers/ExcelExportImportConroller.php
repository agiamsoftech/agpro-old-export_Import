<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExcelExportImportConroller extends Controller
{
    function excelData()
    {        
        return Excel::download(new StudentExpoert, 'studentdata.xlsx');        
    }
    public function import(Request $request) 
    {
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
        ]);
        // $path = $request->file('select_file')->getRealPath();
        // echo $path;exit;
        // $data =  Excel::load($path)->get();
        // dd($data);
        Excel::import(new StudentImport,request()->file('select_file'));
        
        return back()->with('success', 'Excel Data Imported successfully.');
        // return redirect()->back();
    }
}
class StudentExpoert implements FromCollection
{
    public function collection()
    {
        return Student::all();
    }
}
class StudentImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {           
        $insert_data[] = array(
            'name'  => $row['name'],
            'email'   => "",
            'mobile'   => $row['mobile']
           );
        if(!empty($insert_data))
        {
            DB::table('students')->insert($insert_data);
        }        
    }
}