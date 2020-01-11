<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Expenses_Categories;

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

    public function index(Request $request){
        


        if( $request->isMethod('POST') ){
            
            $validate = $request->validate([
                'name' => ['required'],
                'description' => ['required'],
            ]);

            $data = ([
                'name' => $request->name,
                'description' => $request->description,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);

            DB::table('expenses_categories')
                ->insert($data);
            
            $cat = Expenses_Categories::all();
            return view('expenses-cat', ['cat' => $cat]);

        }elseif( $request->isMethod('GET') ){
            
            $cat = Expenses_Categories::all();
            $data = [
                'cat' => $cat
            ];
            return view('expenses-cat', $data);
        }
    }

    public function deleteExpenseCategory(Request $request){
        DB::table('expenses_categories')->where('id','=', $request->deleteCat )->delete();
        return redirect('expenses/categories');
    }

    public function updateExpenseCategory(Request $request){
        
        $response = array(
            'status' => 'Success',
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'description' => $request->input('description')
        );

        $data = ([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        DB::table('expenses_categories')
            ->where('id', $request->input('id') )
            ->update( $data );
        
        return response()->json($response);
    }
}
