<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\recipes;
use App\Models\orders;
use App\Models\united_pizza;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Vendor\Autoload;
use Illuminate\Support\Str;

class pizza extends Controller
{
    public function index(){
        $pizza = recipes::paginate(3);
        return view("index", ["all_recipes" => $pizza, compact($pizza)]);
    }

    public function reg(){
        return view("reg");
    }

    public function auth(){
        return view("auth");
    }
    
    public function catalog(){
        $pizza = recipes::paginate(6);
        return view("catalog", ["all_recipes" => $pizza, compact($pizza)]);
    }

    public function pizza_page($id){
        $pizza = recipes::findOrFail($id);
        return view("pizza_page", ["all_recipes"=>$pizza]);
    }

    public function profile(){
        $user = Auth::user();
        return view("profile", ["all_users" => $user]);
    }

    public function orders(){
        return view("orders");
    }

    public function payment($id){
        $pizza = recipes::findOrFail($id);
        return view("payment", ["all_recipes"=>$pizza]);
    }
    public function make_pizza(){
        $united = united_pizza::all();
        return view("make_pizza", ["united_pizza"=>$united]);
    }

    public function users_valid(Request $request){
        $request->validate([
            "phone"=> "required",
            "name"=> "required",
            "surname"=> "required",
            "password"=> "required"
            
        ]);

        $user = $request->all();

        User::create([
            "phone" => $user["phone"],
            "name"=> $user["name"],
            "surname"=> $user["surname"],
            "password" => Hash::make($user["password"]),
        ]);

        return redirect ("auth")->with("success", "");
    }


    public function users_auth(Request $request){
        $request->validate([
            "phone"=> "required",
            "password"=> "required"
            
        ]);
        $formValue =[
            "phone" => $request->phone,
            "password" => $request->password,
        ];

        if (Auth::attempt($formValue)){
            return redirect('/');
        }
    }

    

    public function make_application(Request $request){
        orders::create([
            "id_user" => $request -> id_user,
        ]);
        try{
            $mail = new PHPMailer(true);
            $mail -> SMTPDebug = 0;
            $mail -> Host ='shayaxmetov_idel@mail.ru';
            $mail -> SMTPAuth = true;
            $mail -> Username = 'shayaxmetov_idel@mail.ru';
            $mail -> Password = 'WBkecwDB7QEwjGSTtb8X';
            $mail -> SMTPSecure = 'tls';
            $mail -> Port = '587';
        
            $mail -> setFrom('shayaxmetov_idel@mail.ru', 'Idel Shayaxmetov');
            $mail -> addAddress('shayaxmetov_idel@mail.ru', 'Idel Shayaxmetov');
        
            $mail -> isHTML(true);
            $mail -> Subject = 'Your check';
            $mail -> Body = Str::random(6);
            $mail -> AltBody = 'Thanks for buying!';
        
            $mail ->send();
            echo '';
            }catch(Exception $e){
                echo "Message could not be sent. Mailer Error:{$mail->ErrorInfo}";
        }
        return redirect ('/');
    }


    // public function catalog($id){
    //     $recipes = united_pizza::findOrFail($id);
    //     $united_pizza = $recipes->recipes()->paginate(3);
    //     return view("catalog", compact("recipes", "united_pizza"));
    // }

}
