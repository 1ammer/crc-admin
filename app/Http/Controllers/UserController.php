<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Degree;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users= User::all()->where('is_active',1);

        return view('quiz.admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date['roles'] = Role::all();
         $date['degrees'] = Degree::all();
        return view("quiz.admin.user.create",$date);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6  ',
            'address' => 'required',
            'gender' => 'required',
            'RGNumber' => 'required',
            'mobile' => 'required',
            'role_id' => 'required',
            'degree' => 'required',  
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->mobile = $request->mobile;
        $user->RGNumber = $request->RGNumber;
        $user->degree = $request->degree;
           
        $user->save();
        session()->flash('success', 'User Created Successfully');

        return redirect()->route('user.all');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $date['user'] = User::findOrFail($id);
        $date['roles'] = Role::all();
        $date['degrees'] = Degree::all();
        return view('quiz.admin.user.edit', $date);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), ['name'=>'required',
//            'email'=>'required|email',
            'role_id'=>'required',
            'is_active'=>'required'
        ]);

        $user = User::findOrFail($id);
        if(trim($request->password) != ''){

            $user->password = bcrypt($request->password);
        }
        $user->name = $request->name;
//        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->mobile = $request->mobile;
        $user->RGNumber = $request->RGNumber;
        $user->degree = $request->degree;
        $user->is_active = (int)$request->is_active;
        $user->save();
//        $user->update($input);
        session()->flash('success', 'User Updated Successfully');
        return redirect()->route('user.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::findOrFail($id);
        $user->is_active =false;
        $user->save();
        session()->flash('success', 'User Deactivated Successfully');
        return redirect()->route('user.all');
    }
}
