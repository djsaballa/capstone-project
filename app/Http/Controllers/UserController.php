<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // LOGIN
    public function login()
    {
        return view('login/main', [

        ]);
    }

    // LOGIN AUTH
    public function loginAuth(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        if ($request->username == 'username') {
            if ($request->password == 'password') {
                return redirect(route('admin_dashboard'));
            } else {
                return back()->with('fail', 'Incorrect Password');
            }
        } else {
            return back()->with('fail', 'Username not recognized');
        }
    }
   
    public function dashboard()
    {
        return view('pages/dashboard', [

        ]);
    }
    
    public function listOfProfiles()
    {
        return view('pages/list-of-profiles', [
          
        ]);
    }
    
    public function listOfUsers()
    {
        return view('pages/list-of-users', [

        ]);
    }
    
    public function inbox()
    {
        return view('pages/inbox', [
            
        ]);
    }

    public function auditLogs()
    {
        return view('pages/audit-logs', [
            
        ]);
    }
     
    public function archive()
    {
        return view('pages/archive', [
            
        ]);
    }


}
