<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    
    public function collection()
    {
        return User::query()->where('status','1')->select('first_name','last_name','gender','date_of_birth','contact','nin','current_address')->get(); 
        
    }

   
    public function headings(): array
    {
        return [
            'FirstName','LastName','Gender','D.o.B','Contact','NIN','Current Address'
        ];
    }
}






