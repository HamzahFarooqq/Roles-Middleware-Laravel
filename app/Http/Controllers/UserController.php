<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   


    public function index()
    {
        return User::all();

        //  $users = User::all();

        //  return view('image', [ 'users' => $users]);
    }

    


    public function create(Request $request)
    {
        $User = new User();

        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = Hash::make($request->password);
        $User->role = $request->role;
        $User->save();

        return response()->json([
            'user' => $User,
        ]);
    }

    

   
    public function show(string $id)
    {
        return User::find($id);
    }




  
    public function update(Request $request , string $id)
    {
        $User = User::find($id);

        // dd($request->name);

        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = Hash::make($request->password);
        $User->role = $request->role;
        $User->save();

        return response()->json([
            'user' => $User,
        ]);
    }

  


    public function delete(Request $request, string $id)
    {
        $User = User::find($id);

       

        $User->delete();

        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'user deleted'
        ]);
    }





    // login and registeration

    function register (Request $request)
    {

        if($request->has('image'))
        {
            $file = $request->file('image');

            $ext= $file->getClientOriginalExtension();

            $filename = time().'.'. $request->name  .'.'. $ext;

            $path = $request->file('image')->storeAs('public/avatars', $filename);

            // $file->move($path, $filename);

        }

       
        $User = new User();
 
        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = Hash::make($request->password);
        $User->role = $request->role;
        $User->image = $filename;
        
        $User->save();

        return response()->json([
            'user' => $User,
        ]);

    }


    function login (Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if($user)
        {
            if(Hash::check($request->password, $user->password))
            {
                $token = $user->createToken('my-token')->plainTextToken;

                return response()->json([
                    'user' => $user,
                    'token' => $token,
                ]);

            } else {

                return response()->json([
                    'message' => 'plz input correct details',
                ]);
            }
            
        } else {

        }

    }


    function logout(Request $request)
    {
        // auth()->user()->token()->delete();

        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'log out'
        ]);

    }


}
