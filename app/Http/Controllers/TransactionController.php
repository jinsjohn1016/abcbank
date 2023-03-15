<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use DateTime;
use Session;
use Hash;
use DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu']           = 'statement';
        $id                     = Auth::user()->id;
        $data['transaction']    = Transaction::select('*')->where('user_id',$id)->get();
        $data['transaction']    = Transaction::where('user_id',$id)->paginate(10);
        return view('transaction.statement',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['id']     = Auth::user()->id;
        $data['result'] = Transaction::select('*')->where('user_id',$data['id'])->latest()->first();
        $amount         = $request->input('amount');
        if($data['result']){
            $balance    = $data['result']['balance']+$amount;
        }else{
            $balance    = $amount;
        }
        Transaction::create([
            'user_id'   => $data['id'],
            'date'      => date('Y-m-d'),
            'time'      => date("H:i:s"),
            'amount'    => $amount,
            'type'      => 'd',
            'details'   => 'Deposit',
            'balance'   => $balance,
            'email'     => '',
        ]);
        return response()->json(['success' => 'Post created successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deposit()
    {
        $data['menu'] = 'deposit';
        return view('transaction.deposit',$data);
    }

    public function withdraw()
    {
        $data['menu'] = 'withdraw';
        return view('transaction.withdraw',$data);
    }

    //check balance for amount validation
    public function balancecheck(Request $request)
    {
        $data['id']     = Auth::user()->id;
        $result         = Transaction::select('*')
                            ->where('user_id',$data['id'])
                            ->latest()
                            ->first();
        if($result){
            $balance    = $result['balance'];
            $amount     = $request->input('amount');
            if($balance < $amount){
                return response()->json('Account doesnot have sufficient balance');
            }
        }else{
            return response()->json('Account doesnot have sufficient balance');
        }
    }

    //store withdraw details
    public function storewithdraw(Request $request)
    {
        $data['id']     = Auth::user()->id;
        $data['result'] = Transaction::select('*')
                            ->where('user_id',$data['id'])
                            ->latest()
                            ->first();
        $amount         = $request->input('amount');
        if($data['result']){
            $balance    = $data['result']['balance']-$amount;
        }else{
            $balance    = $amount;
        }
        Transaction::create([
            'user_id'   => $data['id'],
            'date'      => date('Y-m-d'),
            'time'      => date("H:i:s"),
            'amount'    => $amount,
            'type'      => "d",
            'details'   => 'withdraw',
            'balance'   => $balance,
            'email'     => '',
        ]);
        return response()->json(['success' => 'Post created successfully.']);
    }

    public function transfer()
    {
        $data['menu'] = 'transfer';
        return view('transaction.transfer',$data);
    }

    //store transfer details
    public function storetransfer(Request $request)
    {
        $data['id']     = Auth::user()->id;
        $data['result'] = Transaction::select('*')
                            ->where('user_id',$data['id'])
                            ->latest()->first();
        $amount         = $request->input('amount');
        if($request->input('type') == 'd'){
            if($data['result']){
                $balance    = $data['result']['balance']-$amount;
            }else{
                $balance    = $amount;
            }
            $details = 'transfer to';
        }else{
            if($data['result']){
                $balance    = $data['result']['balance']+$amount;
            }else{
                $balance    = $amount;
            }
            $details = 'transfer from';
        }
        Transaction::create([
            'user_id'   => $data['id'],
            'date'      => date('Y-m-d'),
            'time'      => date("H:i:s"),
            'amount'    => $amount,
            'type'      => $request->input('type'),
            'details'   => $details,
            'balance'   => $balance,
            'email'   => $request->input('email'),
        ]);
        return response()->json(['success' => 'Post created successfully.']);
    }
    
}
