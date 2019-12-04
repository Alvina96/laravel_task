<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Validator;
use App\Color;
use App\Car;

class SiteController extends Controller
{
    public function cars()
    {
      $colors = Color::get();
      $cars = Car::get();
      return view('cars',['colors'=>$colors,'cars'=>$cars]);
    }

    public function addcar(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'car_marka' => 'required',
            'car_model' => 'required',
            'color' => 'required',
            'phone' => 'required'
        ],[
          'car_marka.required'=>'<<Марка автомобиля>> поле обязательное',
          'car_model.required'=>'<<Модель автомобиля>> поле обязательное',
          'color.required'=>'<<Цвет>> поле обязательное',
          'phone.required'=>'<<Номер>> поле обязательное'

        ]);
        if ($validator->passes()) {
          Car::create([
            'car_marka'=>$request->car_marka,
            'car_model'=>$request->car_model,
            'phone'=>$request->phone,
            'color'=>$request->color,
            'ordered'=>$request->ordered,
            'comment'=>$request->comment,
          ]);

          $cars = Car::get();
          return view('all-cars',['cars'=>$cars]);
       }
    	return response()->json(['error'=>$validator->errors()->all()]);
    }
}
