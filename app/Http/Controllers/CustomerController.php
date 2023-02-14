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
        $baltar = $request->get('baltar');
        $bafittings = $request->get('bafittings');
        $memo = $request->get('memo');
        $pg = 25;
        
        // dd($pg);
        
        // if($request->get('tel')) {

        // }

        // dd($tel, $sname, $fname, $sruby, $memo);
        //$getTest = Customer::select('id', 's_name1', 'f_name1', 'tel1', 'address1', 'temple')->get();
        //$getPaginate = Customer::select('id', 's_name1', 'f_name1', 'tel1', 'address1', 'temple')->paginate(50);

        //dd($getTest, $getPaginate);

        $customers = Customer::searchCustomers($tel,$sname,$fname,$sruby,$fruby,$post,$address,$temple,$grave,$repair,$baltar,$bafittings,$memo,$pg)
        // $customers = Customer::where("s_name1", "like", "%$sname%")
        // ->where("tel1", "like", "%$tel%")
        ->select(
            'id','m_name', 's_name1', 'f_name1', 's_ruby1', 'f_ruby1',
            's_name2', 'f_name2', 's_ruby2', 'f_ruby2',
            's_name3', 'f_name3', 's_ruby3', 'f_ruby3',
            'tel1', 'address1', 'tel2', 'address2', 'temple',
            'grave1', 'grave2', 'grave3', 'grave4', 'grave5', 'grave6',
            'repair1', 'repair2', 'repair3', 'repair4', 'repair5', 'repair6',
            'baltar1', 'baltar2', 'baltar3', 'baltar4', 'baltar5', 'baltar6',
            'bafittings1', 'bafittings2', 'bafittings3', 'bafittings4', 'bafittings5', 'bafittings6', 'memo'
            )->paginate(session()->get('pg'));
        // $customers = Customer::searchTemples($request->temple)
        // ->select('id', 's_name1', 'f_name1', 'tel1', 'address1', 'temple')->paginate(20);
        // $request ->session() -> put('tel','$tel');
        // list($query, $pg) = $this->searchCustomers();
        // dd($pg);
        // dd($customers);

        // if($pg === 25){
        //     return to_route('customers.index')
        //     ->with([
        //         'message' => '該当者なし。',
        //         'status' => 'danger'
        //     ]);
        // }

        return Inertia::render('Customers/Index',[
            'customers' => $customers,
            'tel' => session('tel'),
            'sname' => session('sname'),
            'fname' => session('fname'),
            'sruby' => session('sruby'),
            'fruby' => session('fruby'),
            'post' => session('post'),
            'address' => session('address'),
            'temple' => session('temple'),
            'grave' => session('grave'),
            'repair' => session('repair'),
            'baltar' => session('baltar'),
            'bafittings' => session('bafittings'),
            'memo' => session('memo'),
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
        if(empty($request->m_name)){
            $m_namev = "";
        } else {
            $m_namev = $request->m_name;
        }
        if(empty($request->tel1)){
            $tel1v = "";
        } else {
            $tel1v = $request->tel1;
        }
        if(empty($request->tel2)){
            $tel2v = "";
        } else {
            $tel2v = $request->tel2;
        }
        if(empty($request->postcode)){
            $postcodev = "";
        } else {
            $postcodev = $request->postcode;
        }
        if(empty($request->address1)){
            $address1v = "";
        } else {
            $address1v = $request->address1;
        }
        if(empty($request->address2)){
            $address2v = "";
        } else {
            $address2v = $request->address2;
        }
        if(empty($request->temple)){
            $templev = "";
        } else {
            $templev = $request->temple;
        }
        if(empty($request->s_name1)){
            $s_name1v = "";
        } else {
            $s_name1v = $request->s_name1;
        }
        if(empty($request->f_name1)){
            $f_name1v = "";
        } else {
            $f_name1v = $request->f_name1;
        }
        if(empty($request->s_ruby1)){
            $s_ruby1v = "";
        } else {
            $s_ruby1v = $request->s_ruby1;
        }
        if(empty($request->f_ruby1)){
            $f_ruby1v = "";
        } else {
            $f_ruby1v = $request->f_ruby1;
        }
        if(empty($request->s_name2)){
            $s_name2v = "";
        } else {
            $s_name2v = $request->s_name2;
        }
        if(empty($request->f_name2)){
            $f_name2v = "";
        } else {
            $f_name2v = $request->f_name2;
        }
        if(empty($request->s_ruby2)){
            $s_ruby2v = "";
        } else {
            $s_ruby2v = $request->s_ruby2;
        }
        if(empty($request->f_ruby2)){
            $f_ruby2v = "";
        } else {
            $f_ruby2v = $request->f_ruby2;
        }
        if(empty($request->s_name3)){
            $s_name3v = "";
        } else {
            $s_name3v = $request->s_name3;
        }
        if(empty($request->f_name3)){
            $f_name3v = "";
        } else {
            $f_name3v = $request->f_name3;
        }
        if(empty($request->s_ruby3)){
            $s_ruby3v = "";
        } else {
            $s_ruby3v = $request->s_ruby3;
        }
        if(empty($request->f_ruby3)){
            $f_ruby3v = "";
        } else {
            $f_ruby3v = $request->f_ruby3;
        }
        if(empty($request->grave1)){
            $grave1v = "";
        } else {
            $grave1v = $request->grave1;
        }
        if(empty($request->grave2)){
            $grave2v = "";
        } else {
            $grave2v = $request->grave2;
        }
        if(empty($request->grave3)){
            $grave3v = "";
        } else {
            $grave3v = $request->grave3;
        }
        if(empty($request->grave4)){
            $grave4v = "";
        } else {
            $grave4v = $request->grave4;
        }
        if(empty($request->grave5)){
            $grave5v = "";
        } else {
            $grave5v = $request->grave5;
        }
        if(empty($request->grave6)){
            $grave6v = "";
        } else {
            $grave6v = $request->grave6;
        }
        if(empty($request->repair1)){
            $repair1v = "";
        } else {
            $repair1v = $request->repair1;
        }
        if(empty($request->repair2)){
            $repair2v = "";
        } else {
            $repair2v = $request->repair2;
        }
        if(empty($request->repair3)){
            $repair3v = "";
        } else {
            $repair3v = $request->repair3;
        }
        if(empty($request->repair4)){
            $repair4v = "";
        } else {
            $repair4v = $request->repair4;
        }
        if(empty($request->repair5)){
            $repair5v = "";
        } else {
            $repair5v = $request->repair5;
        }
        if(empty($request->repair6)){
            $repair6v = "";
        } else {
            $repair6v = $request->repair6;
        }
        if(empty($request->baltar1)){
            $baltar1v = "";
        } else {
            $baltar1v = $request->baltar1;
        }
        if(empty($request->baltar2)){
            $baltar2v = "";
        } else {
            $baltar2v = $request->baltar2;
        }
        if(empty($request->baltar3)){
            $baltar3v = "";
        } else {
            $baltar3v = $request->baltar3;
        }
        if(empty($request->baltar4)){
            $baltar4v = "";
        } else {
            $baltar4v = $request->baltar4;
        }
        if(empty($request->baltar5)){
            $baltar5v = "";
        } else {
            $baltar5v = $request->baltar5;
        }
        if(empty($request->baltar6)){
            $baltar6v = "";
        } else {
            $baltar6v = $request->baltar6;
        }
        if(empty($request->bafittings1)){
            $bafittings1v = "";
        } else {
            $bafittings1v = $request->bafittings1;
        }
        if(empty($request->bafittings2)){
            $bafittings2v = "";
        } else {
            $bafittings2v = $request->bafittings2;
        }
        if(empty($request->bafittings3)){
            $bafittings3v = "";
        } else {
            $bafittings3v = $request->bafittings3;
        }
        if(empty($request->bafittings4)){
            $bafittings4v = "";
        } else {
            $bafittings4v = $request->bafittings4;
        }
        if(empty($request->bafittings5)){
            $bafittings5v = "";
        } else {
            $bafittings5v = $request->bafittings5;
        }
        if(empty($request->bafittings6)){
            $bafittings6v = "";
        } else {
            $bafittings6v = $request->bafittings6;
        }
        if(empty($request->memo)){
            $memov = "";
        } else {
            $memov = $request->memo;
        }
        Customer::create([
            // 'm_name' => $request->m_name,
            // 'tel1' => $request->tel1,
            // 'tel2' => $request->tel2,
            // 'postcode' => $request->postcode,
            // 'address1' => $request->address1,
            // 'address2' => $request->address2,
            // 'temple' => $request->temple,
            // 's_name1' => $request->s_name1,
            // 'f_name1' => $request->f_name1,
            // 's_ruby1' => $request->s_ruby1,
            // 'f_ruby1' => $request->f_ruby1,
            // 's_name2' => $request->s_name2,
            // 'f_name2' => $request->f_name2,
            // 's_ruby2' => $request->s_ruby2,
            // 'f_ruby2' => $request->f_ruby2,
            // 's_name3' => $request->s_name3,
            // 'f_name3' => $request->f_name3,
            // 's_ruby3' => $request->s_ruby3,
            // 'f_ruby3' => $request->f_ruby3,
            // 'grave1' => $request->grave1,
            // 'repair1' => $request->repair1,
            // 'baltar1' => $request->baltar1,
            // 'bafittings1' => $request->bafittings1,
            // 'grave2' => $request->grave2,
            // 'repair2' => $request->repair2,
            // 'baltar2' => $request->baltar2,
            // 'bafittings2' => $request->bafittings2,
            // 'grave3' => $request->grave3,
            // 'repair3' => $request->repair3,
            // 'baltar3' => $request->baltar3,
            // 'bafittings3' => $request->bafittings3,
            // 'grave4' => $request->grave4,
            // 'repair4' => $request->repair4,
            // 'baltar4' => $request->baltar4,
            // 'bafittings4' => $request->bafittings4,
            // 'grave5' => $request->grave5,
            // 'repair5' => $request->repair5,
            // 'baltar5' => $request->baltar5,
            // 'bafittings5' => $request->bafittings5,
            // 'grave6' => $request->grave6,
            // 'repair6' => $request->repair6,
            // 'baltar6' => $request->baltar6,
            // 'bafittings6' => $request->bafittings6,
            // 'memo' => $request->memo,
            'm_name' => $m_namev,
            'tel1' => $tel1v,
            'tel2' => $tel2v,
            'postcode' => $postcodev,
            'address1' => $address1v,
            'address2' => $address2v,
            'temple' => $templev,
            's_name1' => $s_name1v,
            'f_name1' => $f_name1v,
            's_ruby1' => $s_ruby1v,
            'f_ruby1' => $f_ruby1v,
            's_name2' => $s_name2v,
            'f_name2' => $f_name2v,
            's_ruby2' => $s_ruby2v,
            'f_ruby2' => $f_ruby2v,
            's_name3' => $s_name3v,
            'f_name3' => $f_name3v,
            's_ruby3' => $s_ruby3v,
            'f_ruby3' => $f_ruby3v,
            'grave1' => $grave1v,
            'repair1' => $repair1v,
            'baltar1' => $baltar1v,
            'bafittings1' => $bafittings1v,
            'grave2' => $grave2v,
            'repair2' => $repair2v,
            'baltar2' => $baltar2v,
            'bafittings2' => $bafittings2v,
            'grave3' => $grave3v,
            'repair3' => $repair3v,
            'baltar3' => $baltar3v,
            'bafittings3' => $bafittings3v,
            'grave4' => $grave4v,
            'repair4' => $repair4v,
            'baltar4' => $baltar4v,
            'bafittings4' => $bafittings4v,
            'grave5' => $grave5v,
            'repair5' => $repair5v,
            'baltar5' => $baltar5v,
            'bafittings5' => $bafittings5v,
            'grave6' => $grave6v,
            'repair6' => $repair6v,
            'baltar6' => $baltar6v,
            'bafittings6' => $bafittings6v,
            'memo' => $memov,
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
        if(empty($request->m_name)){
            $customer->m_name = "";
        } else {
            $customer->m_name = $request->m_name;
        }
        if(empty($request->tel1)){
            $customer->tel1 = "";
        } else {
            $customer->tel1 = $request->tel1;
        }
        if(empty($request->tel2)){
            $customer->tel2 = "";
        } else {
            $customer->tel2 = $request->tel2;
        }
        if(empty($request->postcode)){
            $customer->postcode = "";
        } else {
            $customer->postcode = $request->postcode;
        }
        if(empty($request->address1)){
            $customer->address1 = "";
        } else {
            $customer->address1 = $request->address1;
        }
        if(empty($request->address2)){
            $customer->address2 = "";
        } else {
            $customer->address2 = $request->address2;
        }
        if(empty($request->temple)){
            $customer->temple = "";
        } else {
            $customer->temple = $request->temple;
        }
        if(empty($request->s_name1)){
            $customer->s_name1 = "";
        } else {
            $customer->s_name1 = $request->s_name1;
        }
        if(empty($request->s_name2)){
            $customer->s_name2 = "";
        } else {
            $customer->s_name2 = $request->s_name2;
        }
        if(empty($request->s_name3)){
            $customer->s_name3 = "";
        } else {
            $customer->s_name3 = $request->s_name3;
        }
        if(empty($request->f_name1)){
            $customer->f_name1 = "";
        } else {
            $customer->f_name1 = $request->f_name1;
        }
        if(empty($request->f_name2)){
            $customer->f_name2 = "";
        } else {
            $customer->f_name2 = $request->f_name2;
        }
        if(empty($request->f_name3)){
            $customer->f_name3 = "";
        } else {
            $customer->f_name3 = $request->f_name3;
        }
        if(empty($request->s_ruby1)){
            $customer->s_ruby1 = "";
        } else {
            $customer->s_ruby1 = $request->s_ruby1;
        }
        if(empty($request->s_ruby2)){
            $customer->s_ruby2 = "";
        } else {
            $customer->s_ruby2 = $request->s_ruby2;
        }
        if(empty($request->s_ruby3)){
            $customer->s_ruby3 = "";
        } else {
            $customer->s_ruby3 = $request->s_ruby3;
        }
        if(empty($request->f_ruby1)){
            $customer->f_ruby1 = "";
        } else {
            $customer->f_ruby1 = $request->f_ruby1;
        }
        if(empty($request->f_ruby2)){
            $customer->f_ruby2 = "";
        } else {
            $customer->f_ruby2 = $request->f_ruby2;
        }
        if(empty($request->f_ruby3)){
            $customer->f_ruby3 = "";
        } else {
            $customer->f_ruby3 = $request->f_ruby3;
        }
        if(empty($request->grave1)){
            $customer->grave1 = "";
        } else {
            $customer->grave1 = $request->grave1;
        }
        if(empty($request->grave2)){
            $customer->grave2 = "";
        } else {
            $customer->grave2 = $request->grave2;
        }
        if(empty($request->grave3)){
            $customer->grave3 = "";
        } else {
            $customer->grave3 = $request->grave3;
        }
        if(empty($request->grave4)){
            $customer->grave4 = "";
        } else {
            $customer->grave4 = $request->grave4;
        }
        if(empty($request->grave5)){
            $customer->grave5 = "";
        } else {
            $customer->grave5 = $request->grave5;
        }
        if(empty($request->grave6)){
            $customer->grave6 = "";
        } else {
            $customer->grave6 = $request->grave6;
        }
        if(empty($request->repair1)){
            $customer->repair1 = "";
        } else {
            $customer->repair1 = $request->repair1;
        }
        if(empty($request->repair2)){
            $customer->repair2 = "";
        } else {
            $customer->repair2 = $request->repair2;
        }
        if(empty($request->repair3)){
            $customer->repair3 = "";
        } else {
            $customer->repair3 = $request->repair3;
        }
        if(empty($request->repair4)){
            $customer->repair4 = "";
        } else {
            $customer->repair4 = $request->repair4;
        }
        if(empty($request->repair5)){
            $customer->repair5 = "";
        } else {
            $customer->repair5 = $request->repair5;
        }
        if(empty($request->repair6)){
            $customer->repair6 = "";
        } else {
            $customer->repair6 = $request->repair6;
        }
        if(empty($request->baltar1)){
            $customer->baltar1 = "";
        } else {
            $customer->baltar1 = $request->baltar1;
        }
        if(empty($request->baltar2)){
            $customer->baltar2 = "";
        } else {
            $customer->baltar2 = $request->baltar2;
        }
        if(empty($request->baltar3)){
            $customer->baltar3 = "";
        } else {
            $customer->baltar3 = $request->baltar3;
        }
        if(empty($request->baltar4)){
            $customer->baltar4 = "";
        } else {
            $customer->baltar4 = $request->baltar4;
        }
        if(empty($request->baltar5)){
            $customer->baltar5 = "";
        } else {
            $customer->baltar5 = $request->baltar5;
        }
        if(empty($request->baltar6)){
            $customer->baltar6 = "";
        } else {
            $customer->baltar6 = $request->baltar6;
        }
        if(empty($request->bafittings1)){
            $customer->bafittings1 = "";
        } else {
            $customer->bafittings1 = $request->bafittings1;
        }
        if(empty($request->bafittings2)){
            $customer->bafittings2 = "";
        } else {
            $customer->bafittings2 = $request->bafittings2;
        }
        if(empty($request->bafittings3)){
            $customer->bafittings3 = "";
        } else {
            $customer->bafittings3 = $request->bafittings3;
        }
        if(empty($request->bafittings4)){
            $customer->bafittings4 = "";
        } else {
            $customer->bafittings4 = $request->bafittings4;
        }
        if(empty($request->bafittings5)){
            $customer->bafittings5 = "";
        } else {
            $customer->bafittings5 = $request->bafittings5;
        }
        if(empty($request->bafittings6)){
            $customer->bafittings6 = "";
        } else {
            $customer->bafittings6 = $request->bafittings6;
        }
        if(empty($request->memo)){
            $customer->memo = "";
        } else {
            $customer->memo = $request->memo;
        }
        // $customer->m_name = $request->m_name;
        // $customer->tel1 = $request->tel1;
        // $customer->tel2 = $request->tel2;
        // $customer->address1 = $request->address1;
        // $customer->address2 = $request->address2;
        // $customer->temple = $request->temple;
        // $customer->s_name1 = $request->s_name1;
        // $customer->f_name1 = $request->f_name1;
        // $customer->s_ruby1 = $request->s_ruby1;
        // $customer->f_ruby1 = $request->f_ruby1;
        // $customer->s_name2 = $request->s_name2;
        // $customer->f_name2 = $request->f_name2;
        // $customer->s_ruby2 = $request->s_ruby2;
        // $customer->f_ruby2 = $request->f_ruby2;
        // $customer->s_name3 = $request->s_name3;
        // $customer->f_name3 = $request->f_name3;
        // $customer->s_ruby3 = $request->s_ruby3;
        // $customer->f_ruby3 = $request->f_ruby3;
        // $customer->grave1 = $request->grave1;
        // $customer->repair1 = $request->repair1;
        // $customer->baltar1 = $request->baltar1;
        // $customer->bafittings1 = $request->bafittings1;
        // $customer->grave2 = $request->grave2;
        // $customer->repair2 = $request->repair2;
        // $customer->baltar2 = $request->baltar2;
        // $customer->bafittings2 = $request->bafittings2;
        // $customer->grave3 = $request->grave3;
        // $customer->repair3 = $request->repair3;
        // $customer->baltar3 = $request->baltar3;
        // $customer->bafittings3 = $request->bafittings3;
        // $customer->grave4 = $request->grave4;
        // $customer->repair4 = $request->repair4;
        // $customer->baltar4 = $request->baltar4;
        // $customer->bafittings4 = $request->bafittings4;
        // $customer->grave5 = $request->grave5;
        // $customer->repair5 = $request->repair5;
        // $customer->baltar5 = $request->baltar5;
        // $customer->bafittings5 = $request->bafittings5;
        // $customer->grave6 = $request->grave6;
        // $customer->repair6 = $request->repair6;
        // $customer->baltar6 = $request->baltar6;
        // $customer->bafittings6 = $request->bafittings6;
        // $customer->memo = $request->memo;
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
