<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recipes;
use App\Models\united_pizza;

class AdminController extends Controller
{
    public function admin(){
        $data = recipes::all();
        return view("admin", ['applications' => $data]);
    }

    public function create_item(Request $request){
        // dd($request->all());
        $request ->validate([
            "title" => "required",
            "ingridients" => "required",
            "image" => "required",
            "price" => "required|numeric",
            "category" => "required"
        ],[
            "title.required" => "Поле обязательно для заполнения",
            "ingridients.required" => "Поле обязательно для заполнения",
            "image.required" => "Поле обязательно для заполнения",
            "price.required" => "Поле обязательно для заполнения",
            "category.required" => "Поле обязательно для заполнения",
        ]);

        $new = recipes::create([
            "title" => $request->title,
            "ingridients" => $request->ingridients,
            "image" => $request->image,
            "price" => $request->price,
            "category" => $request->category
        ]);
        
        return redirect("/admin");
    }

    public function admin_update($id){
        $application_info = recipes::findOrFail($id);
                
        return view("admin_update", ["update"=> $application_info]);
    }

    public function update(Request $request_update, $id){

        
        $request_update->validate([
            "title" => "required",
            "ingridients" => "required",
            "image" => "required",
            "price" => "required|numeric",
            "category" => "required"
        ], [
            "title.required" => "Поле обязательно для заполнения",
            "ingridients.required" => "Поле обязательно для заполнения",
            "image.required" => "Поле обязательно для заполнения",
            "price.required" => "Поле обязательно для заполнения",
            "category" => "required",

            "price.numeric" => "Только цифры",

        ]);
        $application_info = recipes::find($id);
        // dd( $application_info);
        $application_info->title = $request_update->input('title');
        $application_info->ingridients = $request_update->input('ingridients');
        $application_info->image = $request_update->input('image');
        $application_info->price = $request_update->input('price');
        $application_info->category = $request_update->input('category');
        $application_info->update();
        return redirect("/admin");  
    }

    public function delete($id){
        $application_info = recipes::find($id);
        $application_info->delete();
        return redirect ("/admin");
    }

    // public function addPizza(Request $request){
    //     new Pizza();
    //     title = request('title');
    //     description = request('description');
    //     photo = request('photo');
    //     price = request ('price');
    // }
}
