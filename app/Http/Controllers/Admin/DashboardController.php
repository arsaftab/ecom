<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\newUser;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\View;
class DashboardController extends Controller
{
    // public function __construct()
    // {
    //   //its just a dummy data object.
    //   $user = User::all();
    //   $users = User::where('is_active',0)->get();

  
    //   // Sharing is caring
    //   View::share('users', $users);

    // }
    public function index(){
        // $newUser = User::where('is_active',0)->first();
        // $toAdmin = User::findOrFail(1);
        // Notification::send($toAdmin, new newUser($newUser));
        // $toAdmin->notify(new newUser($newUser));



        // return view('admin.dashboard')->with(compact('users'));

        // View::composer('layouts.admin', function ($view) use ($users) {
        //     $view->with('users', $users);
        // });
        return view('admin.dashboard');
    }
    public function is_active(Request $request)
    {
        $id = $request->user_id;
        $user = User::find($id);
        $user->is_active = 1;
        return $user->update();

    }
    public function show($id, $notId)
    {
        auth()->user()->unreadNotifications->where('id', $notId)->markAsRead();
        $user = User::find($id);
        return view('admin.users.show')->with(compact('user'));
        
    }
    
}
