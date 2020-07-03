<?php

namespace App\Http\Controllers;

use App\Frame_type;
use App\Patient;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::check()){
            if ($request->get('search')) {
                $s = $request->get('search');
                $transactions = Transaction::where('nama_pasien', 'LIKE', '%'.$s.'%')->orWhere('no_transaksi', 'LIKE', '%'.$s.'%')->orWhere('no_bpjs', 'LIKE', '%'.$s.'%')->paginate();

                    if (!$transactions) {
                        return view('transaction.transaction-list', ['transactions' => '0']);
                    }else{
                        return view('transaction.transaction-list', compact('transactions'));
                    }
            }else{
                $transactions = Transaction::paginate(15);
                // dd($transactions);
                return view('transaction.transaction-list', compact('transactions'));
            }
        }else{
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if(Auth::check()){
            $patients = Patient::all();
            $frames = Frame_type::all();
            return view('transaction.transaction-new', compact('patients', 'frames'));
        }else{
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        if($request['total_pay'] == $request['total_transaction']){
            $status = 1;
        }else{
            $status = 0;
        }

        // remove dot from string value 
        $lens_price = str_replace(".", "", $request['lens_price']);
        $total_pay = str_replace(".", "", $request['total_pay']);
        $total_transaction = str_replace(".", "", $request['total_transaction']);

        // no transaksi based on date from timestamp and id
        $date = date('dmY');
        $chekTransaction = Transaction::all();
        if(count((array)$chekTransaction) > 0){
            $get_id = Transaction::select('id')->get()->last()->id + 1;
        }else{
            $get_id = 1;
        }
        $id = "0000".$get_id;
        if($get_id > 9){
            if ($get_id <= 99 ) {
                $id = substr($id, 1);
            }elseif ($get_id <= 999) {
                $id = substr($id, 2);
            }elseif ($get_id <= 9999) {
                $id = substr($id, 3);
            }elseif($get_id > 9999){
                $id = $get_id;
            }
        }
        $no_transaksi =  $date.$id ;

        $request->validate([
            'lens_type' => 'required|string',
            'lens_price' => 'required',
            ]);

        Transaction::create([
            'no_transaksi' => $no_transaksi,
            'lens_type' => $request['lens_type'],
            'bpjs_status' => $request['bpjs_status'],
            'lens_price' => $lens_price,
            'total_pay' => $total_pay,
            'total_transaction' => $total_transaction,
            'transaction_status' => $status,
            'keterangan' => $request['keterangan'],
            'id_user' => $request['id_user'],
            'id_patient' => $request['id_pasien'],
            'id_frame' => $request['id_frame'],
            'updated_by' => $request['id_user'],
            'taken_status' => 0,
        ]);

        DB::transaction(function() use ($request){
            $frame = Frame_type::find($request['id_frame']);
            $frame->stock = $frame->stock - 1;
            $frame->save();
        });

        $last_id = Transaction::select('id')->get()->last()->id;
        return redirect('/transaction/print/'.$last_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transactions = Transaction::where('id', $id)
        ->with('patient')
        ->with('user')
        ->with('frame_type')
        ->get();
        return response()->json($transactions);
        exit;

        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        if(Auth::check()){
            return view('transaction.transaction-repayment');
        }else{
            return redirect('/login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        // return $request->id_transaksi;

        $request->validate([
            'pembayaran' => 'required|same:total_bayar',
            ]);


        DB::transaction(function() use ($request){
            $transactions = Transaction::find($request->id_transaksi);
            $transactions->total_pay = $transactions->total_pay + $request['pembayaran'];
            $transactions->updated_by = Auth::id();
            $transactions->taken_status = 1;
            $transactions->transaction_status = 1;
            $transactions->save();
        });

        return redirect('/')->with('message', 'Transaksi selesai, kacamata telah diambil pelanggan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function printTransaction($id){
        if(Auth::check()){
            $transactions = Transaction::where('id', $id)->get();
            $cashier = Transaction::where('id', $id)->first();
            // return json_encode($transaction);
            // dd ($transactions);
            return view('transaction.transaction-print', compact('transactions', 'cashier'));
        }else{
            return redirect('/login');
        }
    }

    public function getPatient($id){
        $patients = Patient::where('id', $id)->first();
        echo json_encode($patients);
        exit;
    }

    public function getFrame($id){
        $frames = Frame_type::where('id', $id)->first();
        echo json_encode($frames);
        exit;
    }

    public function getEarningMonthly(){
        $month = Transaction::select(DB::raw('SUM(total_transaction) as total'))->get();
        echo json_encode($month);
        exit;
    }

    public function getDetailRepayment($no_transaksi){

        $trans = Transaction::where('no_transaksi', $no_transaksi);
        if(!$trans){
            $transaction = null ;
            return response()->json($transaction);
        }else{
            $transaction = Transaction::where('no_transaksi', $no_transaksi)
            ->with('patient')
            ->with('user')
            ->with('frame_type')
            ->get();
            return response()->json($transaction);
        }
        exit;
    }

    public function findReceipt(Request $request){
        return view('transaction.transaction-receipt');
    }
}
