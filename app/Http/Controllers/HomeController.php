<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Expenses;
use App\Expenses_Categories;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {   

        $expenses = User::find( Auth::user()->id )->expenses;
        $cat = Expenses_Categories::all();

        $total = 0;
        foreach($expenses as $expense){
            $total = $total + $expense->amount;
        }

        $data = ([
            'expenses' => $expenses,
            'category' => $cat,
            'total' => $total
        ]);

        return view('my-expenses', $data);
    }
}
