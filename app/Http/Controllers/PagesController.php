<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transaction;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if(Auth::check()){
            if(Auth::user()->user_role == 1){

                $month = date('m');
                $day = date('d');
                $funds_month = Transaction::select('total_transaction')->whereMonth('created_at', $month)->get()->sum('total_transaction');
                $funds_day = Transaction::select('total_transaction')->whereDay('created_at', $day)->get()->sum('total_transaction');
                $dp = Transaction::where('transaction_status', 1)->count();
                return view('index', compact('dp', 'funds_month', 'funds_day'));
            }else{
                return view('transaction.transaction-home');
            }
        }else{
            return redirect('/login');
        }
    }

    public function home(){
        if(Auth::check()){
            return view('transaction.transaction-home');
        }else{
            return redirect('/login');
        }
    }
    

}
