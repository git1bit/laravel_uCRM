<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tel = $request->get('tel');
        $sname = $request->get('sname');
        $fname = $request->get('fname');
        $sruby = $request->get('sruby');
        $fruby = $request->get('fruby');
        $post = $request->get('post');
        $address = $request->get('address');
        $temple = $request->get('temple');
        $grave = $request->get('grave');
        $repair = $request->get('repair');
        $baltar = $request->get('balter');
        $bafittings = $request->get('bafittings');
        $memo = $request->get('memo');
        $pg = 100;
        
        
        // if($request->get('tel')) {

        // }

        // dd($tel, $sname, $fname, $sruby, $memo);
        //$getTest = Customer::select('id', 's_name1', 'f_name1', 'tel1', 'address1', 'temple')->get();
        //$getPaginate = Customer::select('id', 's_name1', 'f_name1', 'tel1', 'address1', 'temple')->paginate(50);

        //dd($getTest, $getPaginate);

        $customers = Customer::searchCustomers($tel,$sname,$fname,$sruby,$fruby,$post,$address,$temple,$grave,$repair,$baltar,$bafittings,$memo,$pg)
        // $customers = Customer::where("s_name1", "like", "%$sname%")
        // ->where("tel1", "like", "%$tel%")
        ->select('id', 's_name1', 'f_name1', 'tel1', 'address1', 'temple')->paginate($pg);
        // $customers = Customer::searchTemples($request->temple)
        // ->select('id', 's_name1', 'f_name1', 'tel1', 'address1', 'temple')->paginate(20);
        // $request ->session() -> put('tel','$tel');
        // list($query, $pg) = $this->searchCustomers();
        // dd($pg);

        // dd($customers);

        return Inertia::render('Customers/Index',[
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Customers/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        Customer::create([
            'm_name' => $request->m_name,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'postcode' => $request->postcode,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'temple' => $request->temple,
            's_name1' => $request->s_name1,
            'f_name1' => $request->f_name1,
            's_ruby1' => $request->s_ruby1,
            'f_ruby1' => $request->f_ruby1,
            's_name2' => $request->s_name2,
            'f_name2' => $request->f_name2,
            's_ruby2' => $request->s_ruby2,
            'f_ruby2' => $request->f_ruby2,
            's_name3' => $request->s_name3,
            'f_name3' => $request->f_name3,
            's_ruby3' => $request->s_ruby3,
            'f_ruby3' => $request->f_ruby3,
            'grave1' => $request->grave1,
            'repair1' => $request->repair1,
            'baltar1' => $request->baltar1,
            'bafittings1' => $request->bafittings1,
            'grave2' => $request->grave2,
            'repair2' => $request->repair2,
            'baltar2' => $request->baltar2,
            'bafittings2' => $request->bafittings2,
            'grave3' => $request->grave3,
            'repair3' => $request->repair3,
            'baltar3' => $request->baltar3,
            'bafittings3' => $request->bafittings3,
            'grave4' => $request->grave4,
            'repair4' => $request->repair4,
            'baltar4' => $request->baltar4,
            'bafittings4' => $request->bafittings4,
            'grave5' => $request->grave5,
            'repair5' => $request->repair5,
            'baltar5' => $request->baltar5,
            'bafittings5' => $request->bafittings5,
            'grave6' => $request->grave6,
            'repair6' => $request->repair6,
            'baltar6' => $request->baltar6,
            'bafittings6' => $request->bafittings6,
            'memo' => $request->memo,
        ]);

        return to_route('customers.index')
        ->with([
            'message' => '登録しました。',
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //dd($customer);
        return Inertia::render('Customers/Show', [
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        
        return Inertia::render('Customers/Edit', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //dd($customer->m_name, $request->m_name);
        $customer->m_name = $request->m_name;
        $customer->tel1 = $request->tel1;
        $customer->tel2 = $request->tel2;
        $customer->address1 = $request->address1;
        $customer->address2 = $request->address2;
        $customer->temple = $request->temple;
        $customer->s_name1 = $request->s_name1;
        $customer->f_name1 = $request->f_name1;
        $customer->s_ruby1 = $request->s_ruby1;
        $customer->f_ruby1 = $request->f_ruby1;
        $customer->s_name2 = $request->s_name2;
        $customer->f_name2 = $request->f_name2;
        $customer->s_ruby2 = $request->s_ruby2;
        $customer->f_ruby2 = $request->f_ruby2;
        $customer->s_name3 = $request->s_name3;
        $customer->f_name3 = $request->f_name3;
        $customer->s_ruby3 = $request->s_ruby3;
        $customer->f_ruby3 = $request->f_ruby3;
        $customer->grave1 = $request->grave1;
        $customer->repair1 = $request->repair1;
        $customer->baltar1 = $request->baltar1;
        $customer->bafittings1 = $request->bafittings1;
        $customer->grave2 = $request->grave2;
        $customer->repair2 = $request->repair2;
        $customer->baltar2 = $request->baltar2;
        $customer->bafittings2 = $request->bafittings2;
        $customer->grave3 = $request->grave3;
        $customer->repair3 = $request->repair3;
        $customer->baltar3 = $request->baltar3;
        $customer->bafittings3 = $request->bafittings3;
        $customer->grave4 = $request->grave4;
        $customer->repair4 = $request->repair4;
        $customer->baltar4 = $request->baltar4;
        $customer->bafittings4 = $request->bafittings4;
        $customer->grave5 = $request->grave5;
        $customer->repair5 = $request->repair5;
        $customer->baltar5 = $request->baltar5;
        $customer->bafittings5 = $request->bafittings5;
        $customer->grave6 = $request->grave6;
        $customer->repair6 = $request->repair6;
        $customer->baltar6 = $request->baltar6;
        $customer->bafittings6 = $request->bafittings6;
        $customer->memo = $request->memo;
        $customer->save();

        return to_route('customers.index')
        ->with([
            'message' => '更新しました。',
            'status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return to_route('customers.index')
        ->with([
            'message' => '削除しました。',
            'status' => 'danger'
        ]);
    }
}
