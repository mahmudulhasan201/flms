<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;


class WebpageController extends Controller
{
    public function homepage()
    {
        return view('frontend.pages.home');
    }

    public function match()
    {
        // $data = League::with('season')->where('status', 'Active')->where('season_id', '1')->get();
        $data = League::with('season')->where('status', 'Active')->get();

        return view('frontend.pages.matches', compact('data'));
    }

    public function joinLeague()
    {
        return view('frontend.pages.joinLeague');
    }

    public function playerList()
    {
        $data = Player::paginate(10);
        return view('frontend.pages.leaguePlayerList', compact('data'));
    }



    public function registrationForm()
    {
        return view('frontend.pages.customer.registrationForm');
    }

    public function doRegistration(Request $request)
    {
        // dd($request->all());
        Team::create([
            'name' => $request->customer_name,
            'email' => $request->customer_email,
            'mobile' => $request->customer_number,
            'password' => bcrypt($request->customer_password),
            'status' => $request->customer_status,
        ]);
        notify()->success("Registration Successful");
        return redirect()->route('homepage');
    }

    //Frontend Login

    public function loginForm()
    {
        return view('frontend.pages.customer.loginForm');
    }

    public function doLogin(Request $request)
    {

        // dd($request->all());

        $loginInfo = ['email' => $request->email_address, 'password' => $request->password];

        $checkLogin = auth()->guard('customerGuard')->attempt($loginInfo);

        //dd($checkLogin);

        if ($checkLogin) {


            notify()->success("Login Succcessful");
            return redirect()->route('homepage');
        }

        notify()->error("invalid email or password");
        return redirect()->back();
    }
    public function customerLogout()
    {
        auth()->guard('customerGuard')->logout();
        return redirect()->route('homepage');
    }
}
