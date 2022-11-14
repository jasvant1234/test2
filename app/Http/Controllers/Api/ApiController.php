<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public $successStatus = 200;
    public function register(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);
        if($validated->fails())
        {
            return $validated->errors();
        }
        $input=$request->all();
        $input['password'] = Hash::make($request->password);
        $user=User::create($input);
        $success['token'] =  $user->createToken('Shopping')-> accessToken;
        $success['name'] =  $user->name;
        $success['email'] =  $user->email;
        return response()->json(['success'=>$success],$this->successStatus);

    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [

        'email' => 'required|email',
        'password' => 'required',

    ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('Shopping')-> accessToken;
            //   $success['first_name'] =  $user->first_name;
            $success['name'] =  $user->name;
            $success['email'] =  $user->email;
            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
    public function getalluser()
    {
         $user = User::all();
         return response()->json(['success'=>$user],$this->successStatus);
    }

    public function single_user_get()
    {
      $user =Auth::guard('api')->user();
      if(isset($user->id))
      {
         return response()->json(['success'=>$user]);
      }
      return response()->json(['success'=>'User Not Login']);
    }

    public function destroy()
    {
        $user = Auth::guard('api')->user();
        $user->delete();
        if($user)
        {
            return response()->json(['message' => "Record Deleted Sucessfully"]);
        }
        else
        {
            return response()->json(['message' => "Record Not Deleted"]);
        }
    }
    public function logout(Request $request)
    {
        if (Auth::guard('api')->user()) {
            Auth::guard('api')->user()->token()->revoke();
        }
        return response()->json(['success' => 'Logout SuccessFully']);
    }
}
