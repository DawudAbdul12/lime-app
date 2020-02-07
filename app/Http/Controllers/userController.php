<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use App\User;


class userController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        //###################  PAGE NAME #########################
        $page = "all_users";
        
        return view('admin.users.all_users',compact("users",'page'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //###################  PAGE NAME #########################
        $page = "register";
       
        return view('admin.users.register',compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        
        if ($request->hasFile('pic')) {
            
            $image = $request->file('pic');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/user_pic');
            $image->move($destinationPath, $image_name);

        }else{

           $image_name = "";

        }

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->bio = $request->input('bio');
        $user->pic = $image_name;
        $user->phone = $request->input('phone');
        $user->type = $request->input('type');
        $user->status = $request->input('status');
        // SAVE
        $user->save();
         //###################  PAGE NAME #########################
        $page = "register";
        
        return view('admin.users.register')->with(['success' => 'You Have Successfully Added a New User.','page' => $page]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          //
          $user = User::find($id);
          //###################  PAGE NAME #########################
          $page = "edit_user";
          
          return view('admin.users.edit_user',compact("user",'page'));

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
        $user =  User::find($id);

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
           // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        
        if ($request->hasFile('pic')) {
            
            $image = $request->file('pic');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/user_pic');
            $image->move($destinationPath, $image_name);
            $user->pic = $image_name;
        }

        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
       // $user->password = Hash::make($request->input('password'));
        $user->bio = $request->input('bio');
        $user->phone = $request->input('phone');
        $user->type = $request->input('type');
        $user->status = $request->input('status');
        // SAVE
        $user->save();

        $page = "edit_user";
    
        return view('admin.users.edit_user')->with(['success' => 'Updated Successfully.','user' => $user, 'page' => $page]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //
         try{

            $user = User::find($id)->delete();
            // AFTER DELETE
            $users = User::all();
            $success = 'Deleted Successfully';
             //###################  PAGE NAME #########################
            $page = "all_users";

            return view('admin.users.all_users',compact('success','users','page'));

       }catch(\Exception $e) {
           return $e->getMessage();
       }
    }



    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changepassword()
    {
        //###################  PAGE NAME #########################
        $page = "all_users";
        return view("admin.users.changepassword",compact('page'));
      
    }


    public function updatepassword(Request $request)
    {
        $this->validate($request, [
          //  'email'   => 'required|email',
            //'password' => 'required|min:6',
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'currentpassword' => 'required|min:6',
        ]);

        
        $email = auth()->user()->email;

        if (Auth::guard()->attempt(['email' => $email, 'password' => $request->currentpassword], $request->get('remember'))) {
            
            $id = auth()->user()->id;
            $user = User::find($id);
            $user->password = Hash::make($request->input('password'));
            // SAVE
            $user->save();
            //###################  PAGE NAME #########################
            $page = "changepassword";
            return view('admin.users.changepassword')->with(['success' => 'success','page' => $page]);

               }else{
             //###################  PAGE NAME #########################
             $page = "changepassword";
            return view('admin.users.changepassword')->with(['error' => 'error','page' => $page]);          
        }
      
        // return back()->withInput($request->only('email', 'remember'));
    }


}
