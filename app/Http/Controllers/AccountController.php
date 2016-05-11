<?php namespace App\Http\Controllers;
use Redirect;
use Socialize;
use Auth;
use App\User;
class AccountController extends Controller {
  // To redirect github

  public function __construct()
  {
    $this->middleware('guest');
  }

  public function github_redirect() {

    return Socialize::with('github')->redirect();

  }
  // to get authenticate user data
  public function github() {

    $user = Socialize::with('github')->user();
    // Do your stuff with user data.
    //var_dump($user);die;

    $authUser = $this->findOrCreateUser($user);

    Auth::login($authUser, true);

    return redirect('/');
  }

  public function logout(){

    Auth::logout();

    return Redirect::to('/');
  }

  private function findOrCreateUser($githubUser)
  {
        if ($authUser = User::where('github_id', $githubUser->id)->first()) {
            return $authUser;
        }

        return User::create([
            'name' => $githubUser->nickname,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'avatar' => $githubUser->avatar
        ]);
  }

}