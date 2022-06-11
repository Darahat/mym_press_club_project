<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;
use Session;
use Carbon\Carbon;
 class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    public function customLogin(Request $request){

      
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('name', 'password');
         
        if (Auth::attempt($credentials)) {      
            $notification = array(
                  'status' => 'Signed in',
                  'alert-type' => 'success'
              );

            //return redirect()->intended('admin/dashboard')->withSuccess('Signed in');
            // if($request->email != 'erp_admin@gmail.com'){

            // }else{
            //                 return redirect()->intended('admin/erp/dashboard')->with($notification);

            // }
          
            $token = $request->user()->createToken($request->name);
 
            return ['token' => $token->plainTextToken];

        }
      
        // $notification = array(
        //     'status' => 'Login details are not valid',
        //     'alert-type' => 'error'
        // );
        // return 'Failed';
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        
        }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $request->validate([
             'name' => 'required',
             'password' => 'required',
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['password'] = Hash::make($request->password);
        $success = User::create($data);
        if($success){
            print_r('Success');   
        }else{
            print_r('Failed');   
        }
        return $success;
        // return $success;
        // return User::create($data);
        // return User::create([
        //      'name' => $data['name'],
        //      'password' => Hash::make($data['password'])
        //   ])->withSuccess('You have signed-in');
        // $check = $this->create($data);
         
    
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
        //
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
    }
}
