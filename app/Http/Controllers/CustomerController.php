<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', ['customers'=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    public function search(Request $request)
    {
        // APIアクセスURL
        $url = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=' . $request->zipcode;

        // ストリームコンテキストのオプションを作成
        $options = array(
            // HTTPコンテキストオプションをセット
            'http' => array(
                'method'=> 'GET',
                'header'=> 'Content-type: application/json; charset=UTF-8' //JSON形式で表示
            )
        );

        // ストリームコンテキストの作成
        $context = stream_context_create($options);

        $raw_data = file_get_contents($url, false,$context);

        // json の内容を連想配列として $data に格納する
        $data = json_decode($raw_data,true)['results'];

        $address = $data[0]['address1'] . $data[0]['address2'] . $data[0]['address3'];
        return view('customers.search', ['postcode'=>$request->zipcode, 'address'=>$address]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->mail = $request->mail;
        $customer->zipcode = $request->zipcode;
        $customer->address = $request->address;
        $customer->tel = $request->tel;

        $customer->save();

        return redirect(route('customers.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->name = $request->name;
        $customer->mail = $request->mail;
        $customer->zipcode = $request->zipcode;
        $customer->address = $request->address;
        $customer->tel = $request->tel;

        $customer->save();

        return redirect(route('customers.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index');
    }
}
