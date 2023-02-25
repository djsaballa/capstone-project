<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   
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
