<?php namespace App\Http\Controllers;
use Redirect;
use Socialize;
use Auth;
use App\User;
class AccountController extends Controller {
  // To redirect github

  public function __construct()
  {
    //$this->middleware('guest');
  }

  public function github_redirect() {

    return Socialize::with('github')->redirect();

  }
  // to get authenticate user data
  public function github() {

    $user = Socialize::with('github')->user();
    // Do your stuff with user data.
    //var_dump($user);die;

    $authUser = $this->findOrCreateUser($user,'github');

    Auth::login($authUser, true);

    return redirect('/');
  }

  public function facebook_redirect(){

    return Socialize::driver('facebook')->redirect(); 

  }

  public function facebook(){

    $user = Socialize::with('facebook')->user();

    //var_dump($user);die;

    $authUser = $this->findOrCreateUser($user,'facebook');

    Auth::login($authUser, true);

    return redirect('/');

  }

  public function logout(){

    Auth::logout();

    return Redirect::to('/');
  }

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