<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Models\Trainer;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function store(Request $request)
{
    /*$trainer = new Trainer();
    $trainer ->name=$request->input('name');
    $trainer->save();
    return 'Guardar';*/

    return $request->all();
    //return $request->input('name');
    if ($request->hasFile('avatar')){
        $file=$request->file('avatar');
        $name=time().$file->getClientOriginalName();
        $file->move(public_path().'/images/',$name);
        return $name;
    }
}
}