<?php namespace App\Http\Controllers;
use Redirect;
use Socialize;
class AccountController extends Controller {
  // To redirect github
  public function github_redirect() {
    return Socialize::with('github')->redirect();
  }
  // to get authenticate user data
  public function github() {
    $user = Socialize::with('github')->user();
    // Do your stuff with user data.
    print_r($user);die;
  }
}