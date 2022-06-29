<?php

namespace App\Http\Controllers;

use App\Models\Consignment;
use Illuminate\Http\Request;

class ConsignmentController extends Controller
{
    public function getter(){
        $Consignments = Consignment::get();
        return view('dashboard',['Consignments'=>$Consignments]);
    }
    public function store(Request $request){
        Consignment::insert([
            'company'=>$request['company'],
            'contact'=>$request['contact'],
            'addressline1'=>$request['addressline1'],
            'addressline2'=>$request['addressline2'],
            'addressline3'=>$request['addressline3'],
            'city'=>$request['city'],
            'country'=>$request['country'],
            ]
        );
        $Consignments = Consignment::get();
        return redirect('/dashboard')->with('Consignments',$Consignments);
    }
}
