<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class ExpensesController extends Controller
{

    /**
     * Handle 'adding' of expense - member side.
     * 
     */
    public function addExpense(Request $request){

        // dd( $request->category_id );        
        DB::table('expenses')->insert([
            'item' => $request->description,
            'user_id' => Auth::user()->id,
            'amount' => $request->amount,
            'category' => $request->category_id,
        ]);

        return redirect('/dashboard');
    }


    /**
     * Handle 'deleting' of expense - member side.
     * 
     */
    public function deleteExpense(Request $request){
        
        DB::table('expenses')->where('id','=', $request->btnDelete)->delete();
        return redirect('/dashboard');
    }
}
