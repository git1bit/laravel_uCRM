<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Logger\ConsoleLogger;

class Customer extends Model
{
    use HasFactory;
    public function sagasuCustomers($tel,$sname,$fname,$sruby)
    {
        return $tel->where('tel1', 'like', $tel . '%' )
        ->orWhere('tel2', 'like', $tel . '%' );

        dd($tel);
        
    }
    public function scopeSearchCustomers($query,$tel,$sname,$fname,$sruby,$fruby,$post,$address,$temple,$grave,$repair,$baltar,$bafittings,$memo,$pg,$input = null)
    {
        // dd($input,$query,$tel,$sname,$fname,$sruby,$fruby,$post,$address,$temple,$grave,$repair,$baltar,$bafittings,$memo);
        

        if(!empty($query)){
            if(!empty($tel)) {
                if(Customer::where('tel1', 'like', '%'.$tel.'%')
                    ->exists())
                    {
                        $query->where('tel1', 'like', '%'.$tel.'%');
                    }
                // if(Customer::where('tel2', 'like', '%'.$tel.'%')
                //     ->exists())
                //     {
                //         $query->where('tel2', 'like', '%'.$tel.'%');
                //     }
            }
            if(!empty($sname)) {
                $query -> where('s_name1', 'like', '%'.$sname.'%');
            }
            if(!empty($fname)) {
                $query -> where('f_name1', 'like', '%'.$fname.'%');
            }
            if(!empty($sruby)) {
                $query -> where('s_ruby1', 'like', '%'.$sruby.'%');
            }
            if(!empty($fruby)) {
                $query -> where('f_ruby1', 'like', '%'.$fruby.'%');
            }
            if(!empty($post)) {
                $query -> where('postcode', 'like', '%'.$post.'%');
            }
            if(!empty($address)) {
                $query -> where('address1', 'like', '%'.$address.'%');
            }
            if(!empty($temple)) {
                $query -> where('temple', 'like', '%'.$temple.'%');
            }
            if(!empty($grave)) {
                $query -> where('grave1', 'like', '%'.$grave.'%')
                -> orwhere('grave2', 'like', '%'.$grave.'%')
                -> orwhere('grave3', 'like', '%'.$grave.'%')
                -> orwhere('grave4', 'like', '%'.$grave.'%')
                -> orwhere('grave5', 'like', '%'.$grave.'%')
                -> orwhere('grave6', 'like', '%'.$grave.'%');
            }
            if(!empty($repair)) {
                $query -> where('repair1', 'like', '%'.$repair.'%')
                -> orwhere('repair2', 'like', '%'.$repair.'%')
                -> orwhere('repair3', 'like', '%'.$repair.'%')
                -> orwhere('repair4', 'like', '%'.$repair.'%')
                -> orwhere('repair5', 'like', '%'.$repair.'%')
                -> orwhere('repair6', 'like', '%'.$repair.'%');
            }
            if(!empty($baltar)) {
                $query -> where('baltar1', 'like', '%'.$baltar.'%')
                -> orwhere('baltar2', 'like', '%'.$baltar.'%')
                -> orwhere('baltar3', 'like', '%'.$baltar.'%')
                -> orwhere('baltar4', 'like', '%'.$baltar.'%')
                -> orwhere('baltar5', 'like', '%'.$baltar.'%')
                -> orwhere('baltar6', 'like', '%'.$baltar.'%');
            }
            if(!empty($bafittings)) {
                $query -> where('bafittings1', 'like', '%'.$bafittings.'%')
                -> orwhere('bafittings2', 'like', '%'.$bafittings.'%')
                -> orwhere('bafittings3', 'like', '%'.$bafittings.'%')
                -> orwhere('bafittings4', 'like', '%'.$bafittings.'%')
                -> orwhere('bafittings5', 'like', '%'.$bafittings.'%')
                -> orwhere('bafittings6', 'like', '%'.$bafittings.'%');
            }
            if(!empty($memo)) {
                $query -> where('memo', 'like', '%'.$memo.'%');
            }
            if(!empty($pg)) {
                $pg=$query->count();
            }
            // dd($pg);

            return $query;
            // $query->if(!empty($tel)
            //     where('tel1', 'like', '%'.$tel.'%')
            // )
            // ->if(!empty($sname)
            //     where('s_name1', 'like', '%'.$sname.'%')
            // )
            // ->if(!empty($fname)
            //     where('f_name1', 'like', '%'.$fname.'%')
            // )
            // ->if(!empty($sruby)
            //     where('s_ruby1', 'like', '%'.$sruby.'%')
            // )
            // ->where('f_ruby1', 'like', '%'.$fruby.'%')
            // ->where('postcode', 'like', '%'.$post.'%')
            // ->where('address1', 'like', '%'.$address.'%')
            // ->where('temple', 'like', '%'.$temple.'%')
            // ->where('grave1', 'like', '%'.$grave.'%')
            // ->where('repair1', 'like', '%'.$repair.'%')
            // ->where('baltar1', 'like', '%'.$baltar.'%')
            // ->where('bafittings1', 'like', '%'.$bafittings.'%')
            // ->where('memo', 'like', '%'.$memo.'%');
        }
            // if(Customer::where('s_name1', 'like', '%'.$sname.'%')
            // ->orwhere('s_name2', 'like', '%'.$sname.'%')
            // ->orwhere('s_name3', 'like', '%'.$sname.'%')
            // ->exists())
            // {
                // if(!empty($tel)){
                //     if(Customer::where('tel1', 'like', '%'.$tel.'%')
                //     ->orwhere('tel2', 'like', '%'.$tel.'%')
                //     ->exists())
                //     {
                        // $query->where('s_name1', 'like', '%'.$sname.'%')
                        // ->where('tel1', 'like', '%'.$tel.'%');
                        // ->orwhere('s_name2', 'like', '%'.$sname.'%')
                        // ->orwhere('s_name3', 'like', '%'.$sname.'%')
                        // ->orwhere('tel2', 'like', '%'.$tel.'%');
                //     }
                // }else{
                    // $query->where('s_name1', 'like', '%'.$sname.'%');
                    // ->orwhere('s_name2', 'like', '%'.$sname.'%')
                    // ->orwhere('s_name3', 'like', '%'.$sname.'%');
                // }
            // }
        // }

        // if(!empty($tel)){
        //     if(Customer::where('tel1', 'like', '%'.$tel.'%')
        //     ->orwhere('tel2', 'like', '%'.$tel.'%')
        //     ->exists())
        //     {
        //         $query->where('tel1', 'like', '%'.$tel.'%')
        //         ->orwhere('tel2', 'like', '%'.$tel.'%');
        //     }
        // }

        // dd($query->get());

        // return $query;

        // return $query;
            // if(Customer::where('s_name1', 'like', '%'.$sname.'%')
            // ->orWhere('f_name1', 'like', '%'.$fname.'%')
            // ->orWhere('s_ruby1', 'like', '%'.$sruby.'%')
            // ->orWhere('f_ruby1', 'like', '%'.$fruby.'%')
            // ->orWhere('tel1', 'like', '%'.$tel.'%')
            // ->orWhere('tel2', 'like', '%'.$tel.'%')
            // ->orWhere('address1', 'like', '%'.$address.'%')
            // ->orWhere('address2', 'like', '%'.$address.'%')
            // ->orWhere('postcode', 'like', '%'.$post.'%')
            // ->orWhere('temple', 'like', '%'.$temple.'%')
            // ->orWhere('grave1', 'like', '%'.$grave.'%')
            // ->orWhere('repair1', 'like', '%'.$repair.'%')
            // ->orWhere('baltar1', 'like', '%'.$baltar.'%')
            // ->orWhere('bafittings1', 'like', '%'.$bafittings.'%')
            // ->orWhere('memo', 'like', '%'.$memo.'%')
            // ->dd($query)
            // ->exists())
            // {
                // return $query->where('s_name1', 'like', '%'.$sname.'%')
                // ->Where('f_name1', 'like', '%'.$fname.'%')
                // ->Where('s_ruby1', 'like', '%'.$sruby.'%')
                // ->Where('f_ruby1', 'like', '%'.$fruby.'%')
                // ->Where('tel1', 'like', '%'.$tel.'%')
                // ->orWhere('tel2', 'like', '%'.$tel.'%');
                // ->Where('address1', 'like', '%'.$address.'%')
                // ->orWhere('address2', 'like', '%'.$address.'%')
                // ->Where('postcode', 'like', '%'.$post.'%')
                // ->Where('temple', 'like', '%'.$temple.'%')
                // ->Where('grave1', 'like', '%'.$grave.'%')
                // ->Where('repair1', 'like', '%'.$repair.'%')
                // ->Where('baltar1', 'like', '%'.$baltar.'%')
                // ->Where('bafittings1', 'like', '%'.$bafittings.'%')
                // ->Where('memo', 'like', '%'.$memo.'%');

                // dd($query);
            // }
        // }
    }
    // public function scopeSearchTemples($query, $input = null)
    // {
    //     if(!empty($input)){
    //         if(Customer::where('temple', 'like', $input . '%' )
    //         ->orWhere('temple', 'like', $input . '%')->exists())
    //         {
    //             return $query->where('temple', 'like', $input . '%' )
    //             ->orWhere('temple', 'like', $input . '%');
    //         }
    //     }
    // }

    protected $fillable = [
        'm_name',
        'tel1',
        'tel2',
        'postcode',
        'address1',
        'address2',
        'temple',
        's_name1',
        'f_name1',
        's_ruby1',
        'f_ruby1',
        's_name2',
        'f_name2',
        's_ruby2',
        'f_ruby2',
        's_name3',
        'f_name3',
        's_ruby3',
        'f_ruby3',
        'grave1',
        'repair1',
        'baltar1',
        'bafittings1',
        'grave2',
        'repair2',
        'baltar2',
        'bafittings2',
        'grave3',
        'repair3',
        'baltar3',
        'bafittings3',
        'grave4',
        'repair4',
        'baltar4',
        'bafittings4',
        'grave5',
        'repair5',
        'baltar5',
        'bafittings5',
        'grave6',
        'repair6',
        'baltar6',
        'bafittings6',
        'memo',
    ];
}
