<?php

class AuthController extends BaseController {

    public function getSignIn()
    {
        return View::make('SignIn')->with('title', 'Please Sign in!');
    }

    public function getSignOff()
    {
        if(Session::has('AuthorEmail'))
            Session::forget('AuthorEmail');
        return Redirect::route('SignIn');
    }

    public function postSignIn()
    {
        $rules =array('username' => 'required');
        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails())
        {
            return Redirect::route('SignIn')->withErrors($validator);
        }
        else
        {
            Session::put('AuthorEmail', Input::get('username'));
            return Redirect::route('home');
        }


    }

}

