<?php

namespace App\Http\Controllers;

use App\User;
use App\UserBase;
use Cyberduck\LaravelExcel\ImporterFacade;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('admin', '!=', 1)->get();
        return view('admin.index', compact('users'));
    }

    public function import()
    {
        //dd();
        $filename = storage_path('app/public/dane.xlsx');
        $excel = ImporterFacade::make('Excel');
        $excel->load('dane.xlsx');
        $collection = $excel->getCollection();
       // dd($collection);

        $loop = 1;
        foreach ($collection as $coll) {
            if ($loop == 1) {

            } else {
                UserBase::updateOrCreate([
                    'nip'=>$coll[2],
                    'id_abc'=>$coll[0],
                    'id_abc_sklep'=>$coll[1],
                ],[
                    'nazwa'=>$coll[3],
                    'kontakt'=>$coll[4],
                    'kod_pocztowy'=>$coll[5],
                    'miejscowosc'=>$coll[6],
                    'ulica'=>$coll[7],
                    'firma_nazwa'=>$coll[8],
                    'firma_kontakt'=>$coll[9],
                ]);
            }
            $loop++;
        }
       return redirect()->route('admin.index');
    }
}
