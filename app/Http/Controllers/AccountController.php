<?php namespace App\Http\Controllers;
use Redirect;
use Socialize;
use Auth;
use App\User;
class AccountController extends Controller {
  // Controller for working with authentication

  public function __construct()
  {
    //$this->middleware('guest');
  }
  //redirect to github auth
  public function github_redirect() {

    return Socialize::with('github')->redirect();

  }
  // to get authenticate user data
  public function github() {

    $user = Socialize::with('github')->user();

    $authUser = $this->findOrCreateUser($user,'github');

    Auth::login($authUser, true);

    return redirect('/');
  }
  //redirect to facebook auth
  public function facebook_redirect(){

    return Socialize::driver('facebook')->redirect(); 

  }
  //get facebook user data
  public function facebook(){

    $user = Socialize::with('facebook')->user();

    $authUser = $this->findOrCreateUser($user,'facebook');

    Auth::login($authUser, true);

    return redirect('/');

  }

  public function logout(){

    Auth::logout();

    return Redirect::to('/');
  }
  //check if user is registered if not registered him 
  private function findOrCreateUser($user,$type)
  { 

        switch ($type) {
            case 'github':
                if ($authUser = User::where('github_id', $user->id)->first()) {
                    return $authUser;
                }

                return User::create([
                    'name' => $user->nickname,
                    'email' => $user->email,
                    'github_id' => $user->id,
                    'avatar' => $user->avatar
                ]);

                break;
            case 'facebook':
                if ($authUser = User::where('facebook_id', $user->id)->first()) {
                    return $authUser;
                }

                return User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                    'avatar' => $user->avatar
                ]);
                
                break;
        }
        
  }

}