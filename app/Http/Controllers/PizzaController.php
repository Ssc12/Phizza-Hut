<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use Session;

class PizzaController extends Controller
{

    public function pizza($id){
        if(Session::get('login') == TRUE){
            $user = \App\User::find(Session::get('id'));
        }else $user = NULL;

        $pizza = \App\Pizza::find($id);
        return view('pizza.detail',[
            'user' => $user,
            'pizza' => $pizza
        ]);
    }

    public function home(){
        if(Session::get('login') == TRUE){
            $user = \App\User::find(Session::get('id'));
        }else $user = NULL;
        $pizza = \App\Pizza::paginate(6); 
         
        return view('home',[
            'user' => $user,
            'pizzas'=>$pizza
        ]);
    }

     public function search(Request $request){ 
        if(Session::get('login') == TRUE){
            $user = \App\User::find(Session::get('id'));
        }else $user = NULL;

        $search = $request->get('q'); 
       
        $pizza = \App\Pizza::where("name",'like','%'.$search.'%')->paginate(6);

        return view('home', [
            'user' => $user,
            'pizzas' => $pizza
        ]);
    }

    public function showAddPizzaForm(){   
        if(Session::get('login') == TRUE){
            $user = \App\User::find(Session::get('id'));
        }else return redirect()->route('home');

        return view('pizza.addPizza', [
            'user' => $user
        ]);
    }
  
    public function addPizza(Request $request){   
        if(Session::get('login') == TRUE){
            $user = \App\User::find(Session::get('id'));
        }else return redirect()->route('home');

        $this->validate($request, [
            'pizzaName'=>'required|max:20',
            'pizzaPrice'=>'required|numeric|min:10000',
            'pizzaDescription'=>'required|min:20',
            'pizzaImage' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        
        $pizza = new \App\Pizza();
        $pizza->name = $request->pizzaName;
        $pizza->price = $request->pizzaPrice;
        $pizza->description = $request->pizzaDescription;
        $pizza->image = $request->file('pizzaImage')->store('/imagePizzas/'.$request->pizzaName, 'public');
        $pizza->save();     

       return redirect()->route('home');
    }

    public function showUpdatePizzaForm($id){   
        if(Session::get('login') == TRUE){
            $user = \App\User::find(Session::get('id'));
        }else return redirect()->route('home');

        $pizza = \App\Pizza::find($id);

        return view('pizza.editPizza', [
            'user' => $user,
            'pizza' => $pizza
        ]);
    }

    public function updatePizza(Request $request,$id){   
        if(Session::get('login') == TRUE){
            $user = \App\User::find(Session::get('id'));
        }else return redirect()->route('home');

        $this->validate($request, [
            'pizzaName'=>'required|max:20',
            'pizzaPrice'=>'required|numeric|min:10000',
            'pizzaDescription'=>'required|min:20',
            'pizzaImage' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        
        $pizza = \App\Pizza::find($id);
        $pizza->name = $request->pizzaName;
        $pizza->price = $request->pizzaPrice;
        $pizza->description = $request->pizzaDescription;
        Storage::disk('public')->delete($pizza->image);
        $pizza->image = $request->file('pizzaImage')->store('/imagePizzas/'.$request->pizzaName, 'public');
        $pizza->save();    

       return redirect()->route('home');
    }

    public function showDeletePage($id){    
        if(Session::get('login') == TRUE){
            $user = \App\User::find(Session::get('id'));
        }else return redirect()->route('home');

        $pizza = \App\Pizza::find($id);

        return view('pizza.deletePizza', [
            'user' => $user,
            'pizza' => $pizza
        ]);
    }

    public function deletePizza(Request $request,$id){   
        if(Session::get('login') == TRUE){
            $user = \App\User::find(Session::get('id'));
        }else return redirect()->route('home');
        
        $pizza = \App\Pizza::find($id);
        Storage::disk('public')->delete($pizza->image);
        $pizza->delete();    

       return redirect()->route('home');
    }
}
