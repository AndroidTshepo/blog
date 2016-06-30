<?php

//Creatting my containers
namespace  App\Http\Controllers;

//If have to go out of the app directory
//use Illuminate

#Process variables data or params
#talk to the model
#recieve from the model
#complete process data fro the model if needed
#pass data to the correct view



use App\Post;
//use App\Section;

class PagesController extends Controller{

//    public function __construct(){

////        $this->middleware('auth');
//    }


    public function index()
    {
        return redirect('/pages.welcome');
    }

    public  function  getIndex(){
         # $posts =  Post:: is equivalent to select *
        $posts =  Post::orderBy('created_at','desc')->limit(5)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    public function  getContact(){


        return view('pages.contact');

    }

    public  function getAbout(){
        $company = 'MoreCorp';
        $site = 'Blog';
        $fullname = $company." ".$site;
        $email = 'info@morecorp.com';

        #Passing data via an array;
        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $fullname;


        return view('pages.about')->withData($data);

    }

    public function  getRegister(){
        return view('auth.register');
    }

    public function  getLogin(){
        return view('auth.login');
    }

//    public function  getLogout(){
//        return view('auth.logout');
//    }

}