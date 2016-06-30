<?php
namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function postSignUp(Request $request)
    {

        $this->validate($request,[
            //validating the user email
            'email' => 'required|email||unique:users',
            'name' => 'required|max:120',
            'password' => 'required|min:4'


        ]);

        $email = $request['email'];
        $name = $request['name'];
        //Encrypting my password here
        $password = bcrypt($request['password']);

        //Creating a new instance of the user
        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->password = $password;

        //Writing the data to the database
        $user->save();
        //After the user successfully signup they get redirected to the pots
        Auth::login($user);
        return redirect()->route('posts.index');


    }

    public function postSignIn(Request $request)
    {

        $this->validate($request, [
            //validating the user email
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {

            return redirect()->route('posts.index');


        }
        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
//        redirecting user back the the home page
        return redirect('/');
    }

}