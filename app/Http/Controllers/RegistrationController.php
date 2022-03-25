<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function index(){
        $url = url('/register');
        $title = "New Registration";
        $data = compact('url', 'title');
        return view('form')->with($data);
    }

    public function register(Request $request){

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'profile_pic' => 'required',
            ]
        );

        $customer = new Registration;
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->password = md5($request['password']);
        $filename = time()."-ans.".$request->file('profile_pic')->getClientOriginalExtension();
        $request->file('profile_pic')->storeAs('public/uploads', $filename);
        $customer->image = $filename;
        $customer->save();
        return redirect('/customer/view');
        }

    public function view(Request $request){
        $search = $request['search'] ?? "";
        if($search != ""){
            $customers = Registration::latest()->where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->paginate(10);
        }else{
            $customers = Registration::latest()->paginate(10);
        }
       
        $data = compact('customers');
        return view('customer_view')->with($data);
    }  

    public function delete($id){
        Registration::find($id)->delete();
        return redirect()->back();
    }

    public function forcedelete($id){
        $customer = Registration::withTrashed()->find($id);
        $status = $customer->forceDelete();
        if($status){
            session()->flash('delete', 'Data Successfully Deleted!');
            return redirect('/customer/view');
        }
    }

    public function trash(){
        $customers = Registration::onlyTrashed()->get();
        $data = compact('customers');
        return view('customer_trash')->with($data);
    }

    public function restore($id){
        $customer = Registration::withTrashed()->find($id);
        $status = $customer->restore();
        if($status){
            session()->flash('status', 'Data Successfully Restored!');
            return redirect('/customer/view');
        }
        
    }

    public function edit($id){
        $customer = Registration::find($id);
        $url = url('/customer/update') . "/" . $id;
        $title = "Update Customer";
        $data = compact('customer', 'url', 'title');
        return view('update_form')->with($data); 
    }

    public function update($id, Request $request){

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
            ]
        );

        $customer = Registration::find($id);

        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->save();

        return redirect('customer/view');
    }

}
