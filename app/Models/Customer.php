<?php

namespace App\Models;

use App\Models\Customer as ModelsCustomer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Logger\ConsoleLogger;

class Customer extends Model
{
    use HasFactory;
    public function scopeSearchCustomers($query,$tel,$sname,$fname,$sruby,$fruby,$post,$address,$temple,$grave,$repair,$baltar,$bafittings,$memo,$pg,$input = null)
    {
        // dd($input,$query,$tel,$sname,$fname,$sruby,$fruby,$post,$address,$temple,$grave,$repair,$baltar,$bafittings,$memo);
        
        session()->forget(['pg','tel','sname','fname','sruby','fruby','post','address','temple','grave','repair','baltar','bafittings','memo']);

        // $teld = Customer::select('tel1','tel2')->get();
        // dd($teld);

        if(!empty($query)){
            // if(!empty($tel) && !empty($sname) && !empty($fname) && !empty($sruby) && !empty($fruby) && !empty($post))
                        $query
                        ->where('postcode', 'like', '%'.$post.'%')
                        ->where('address1', 'like', '%'.$address.'%')
                        ->where('temple', 'like', '%'.$temple.'%')
                        ->where('memo', 'like', '%'.$memo.'%')
                        ->where(function($query) use ($grave) {
                            $query->where('grave1', 'like', '%'.$grave.'%')
                            ->orWhere('grave2', 'like', '%'.$grave.'%')
                            ->orWhere('grave3', 'like', '%'.$grave.'%')
                            ->orWhere('grave4', 'like', '%'.$grave.'%')
                            ->orWhere('grave5', 'like', '%'.$grave.'%')
                            ->orWhere('grave6', 'like', '%'.$grave.'%');
                        })
                        ->where(function($query) use ($repair) {
                            $query->where('repair1', 'like', '%'.$repair.'%')
                            ->orWhere('repair2', 'like', '%'.$repair.'%')
                            ->orWhere('repair3', 'like', '%'.$repair.'%')
                            ->orWhere('repair4', 'like', '%'.$repair.'%')
                            ->orWhere('repair5', 'like', '%'.$repair.'%')
                            ->orWhere('repair6', 'like', '%'.$repair.'%');
                        })
                        ->where(function($query) use ($baltar) {
                            $query->where('baltar1', 'like', '%'.$baltar.'%')
                            ->orWhere('baltar2', 'like', '%'.$baltar.'%')
                            ->orWhere('baltar3', 'like', '%'.$baltar.'%')
                            ->orWhere('baltar4', 'like', '%'.$baltar.'%')
                            ->orWhere('baltar5', 'like', '%'.$baltar.'%')
                            ->orWhere('baltar6', 'like', '%'.$baltar.'%');
                        })
                        ->where(function($query) use ($bafittings) {
                            $query->where('bafittings1', 'like', '%'.$bafittings.'%')
                            ->orWhere('bafittings2', 'like', '%'.$bafittings.'%')
                            ->orWhere('bafittings3', 'like', '%'.$bafittings.'%')
                            ->orWhere('bafittings4', 'like', '%'.$bafittings.'%')
                            ->orWhere('bafittings5', 'like', '%'.$bafittings.'%')
                            ->orWhere('bafittings6', 'like', '%'.$bafittings.'%');
                        })
                        ->where(function($query) use ($address) {
                            $query->where('address1', 'like', '%'.$address.'%')
                            ->orWhere('address2', 'like', '%'.$address.'%');
                        })
                        ->where(function($query) use ($sname) {
                            $query->where('s_name1', 'like', '%'.$sname.'%')
                            ->orWhere('s_name2', 'like', '%'.$sname.'%')
                            ->orWhere('s_name3', 'like', '%'.$sname.'%');
                        })
                        ->where(function($query) use ($fname) {
                            $query->where('f_name1', 'like', '%'.$fname.'%')
                            ->orWhere('f_name2', 'like', '%'.$fname.'%')
                            ->orWhere('f_name3', 'like', '%'.$fname.'%');
                        })
                        ->where(function($query) use ($sruby) {
                            $query->where('s_ruby1', 'like', '%'.$sruby.'%')
                            ->orWhere('s_ruby2', 'like', '%'.$sruby.'%')
                            ->orWhere('s_ruby3', 'like', '%'.$sruby.'%');
                        })
                        ->where(function($query) use ($fruby) {
                            $query->where('f_ruby1', 'like', '%'.$fruby.'%')
                            ->orWhere('f_ruby2', 'like', '%'.$fruby.'%')
                            ->orWhere('f_ruby3', 'like', '%'.$fruby.'%');
                        })
                        ->where(function($query) use ($tel) {
                            $query->where('tel1', 'like', '%'.$tel.'%')
                            ->orWhere('tel2', 'like', '%'.$tel.'%');
                        })
                        ->get();
            if(!empty($tel)) {
                // if(Customer::where('tel1', 'like', '%'.$tel.'%')
                // ->orWhere('tel2', 'like', '%'.$tel.'%')
                // ->exists())
                //     {
                        // $query->where('tel1','like', '%'.$tel.'%')->orWhere('tel2','like', '%'.$tel.'%');
                        //         session(['tel' => $tel]);
                        // ->where(function ($query) use ($tel) {
                        //     $query -> where('tel2', 'like', '%'.$tel.'%')->orwhere('tel1', 'like', '%'.$tel.'%');
                        // });
                        // $query->where('tel2', 'like', '%'.$tel.'%')
                        // ->where('tel1', 'like', '%'.$tel.'%');
                        // session(['tel' => $tel]);
                    // }
                if(Customer::where('tel1', 'like', '%'.$tel.'%')
                    // ->where('s_name1', 'like', '%'.$sname.'%')
                    // ->where('f_name1', 'like', '%'.$fname.'%')
                    // ->where('s_ruby1', 'like', '%'.$sruby.'%')
                    // ->where('f_ruby1', 'like', '%'.$fruby.'%')
                    ->exists())
                    {
                        // dd($query->get());
                    }
                // elseif(Customer::where('tel2', 'like', '%'.$tel.'%')
                //     ->exists())
                //     {
                //         $query->where('tel2', 'like', '%'.$tel.'%');
                //         session(['tel' => $tel]);
                //     }
                // if(Customer::orwhere('tel1', 'like', '%'.$tel.'%')
                // ->orwhere('tel2', 'like', '%'.$tel.'%')
                // ->exists())
                //     {
                //         $query->orwhere('tel2', 'like', '%'.$tel.'%')
                //         ->orwhere('tel1', 'like', '%'.$tel.'%');
                //         session(['tel' => $tel]);
                //     }
                session(['tel' => $tel]);
            }
            if(!empty($sname)) {
                if(Customer::where('s_name1', 'like', '%'.$sname.'%')
                    ->exists())
                    {
                        // $query->where('s_name1', 'like', '%'.$sname.'%');
                        session(['sname' => $sname]);
                    }
                elseif(Customer::where('s_name2', 'like', '%'.$sname.'%')
                    ->exists())
                    {
                        // $query->where('s_name2', 'like', '%'.$sname.'%');
                        session(['sname' => $sname]);
                    }
                elseif(Customer::where('s_name3', 'like', '%'.$sname.'%')
                    ->exists())
                    {
                        // $query->where('s_name3', 'like', '%'.$sname.'%');
                        session(['sname' => $sname]);
                    }
                // if(Customer::orwhere('s_name1', 'like', '%'.$sname.'%')
                //     ->orwhere('s_name2', 'like', '%'.$sname.'%')
                //     ->orwhere('s_name3', 'like', '%'.$sname.'%')
                //     ->exists())
                //         {
                //             $query->orwhere('s_name1', 'like', '%'.$sname.'%')
                //             ->orwhere('s_name2', 'like', '%'.$sname.'%')
                //             ->orwhere('s_name3', 'like', '%'.$sname.'%');
                //             session(['sname' => $sname]);
                //         }
            }
            if(!empty($fname)) {
                if(Customer::where('f_name1', 'like', '%'.$fname.'%')
                    ->exists())
                    {
                        // $query->where('f_name1', 'like', '%'.$fname.'%');
                        session(['fname' => $fname]);
                    }
                elseif(Customer::where('f_name2', 'like', '%'.$fname.'%')
                    ->exists())
                    {
                        // $query->where('f_name2', 'like', '%'.$fname.'%');
                        session(['fname' => $fname]);
                    }
                elseif(Customer::where('f_name3', 'like', '%'.$fname.'%')
                    ->exists())
                    {
                        // $query->where('f_name3', 'like', '%'.$fname.'%');
                        session(['fname' => $fname]);
                    }
                // if(Customer::orwhere('s_name1', 'like', '%'.$sname.'%')
                //     ->orwhere('s_name2', 'like', '%'.$sname.'%')
                //     ->orwhere('s_name3', 'like', '%'.$sname.'%')
                //     ->exists())
                //         {
                //             $query->orwhere('s_name1', 'like', '%'.$sname.'%')
                //             ->orwhere('s_name2', 'like', '%'.$sname.'%')
                //             ->orwhere('s_name3', 'like', '%'.$sname.'%');
                //             session(['sname' => $sname]);
                //         }
            }
            // if(!empty($sname)) {
            //     $query -> where('s_name1', 'like', '%'.$sname.'%');
            //     session(['sname' => $sname]);
            // }
            // if(!empty($fname)) {
            //     $query -> where('f_name1', 'like', '%'.$fname.'%');
            //     session(['fname' => $fname]);
            // }
            if(!empty($sruby)) {
                // $query -> where('s_ruby1', 'like', '%'.$sruby.'%');
                session(['sruby' => $sruby]);
            }
            if(!empty($fruby)) {
                // $query -> where('f_ruby1', 'like', '%'.$fruby.'%');
                session(['fruby' => $fruby]);
            }
            if(!empty($post)) {
                // $query -> where('postcode', 'like', '%'.$post.'%');
                session(['post' => $post]);
            }
            if(!empty($address)) {
                // $query -> where('address1', 'like', '%'.$address.'%');
                session(['address' => $address]);
            }
            if(!empty($temple)) {
                session(['temple' => $temple]);
                // $query -> where('temple', 'like', '%'.$temple.'%');
            }
            if(!empty($grave)) {
                if(Customer::where('grave1', 'like', '%'.$grave.'%')
                    ->exists())
                    {
                        // $query -> where('grave1', 'like', '%'.$grave.'%');
                        session(['grave' => $grave]);
                    }
                elseif(Customer::where('grave2', 'like', '%'.$grave.'%')
                    ->exists())
                    {
                        // $query -> where('grave2', 'like', '%'.$grave.'%');
                        session(['grave' => $grave]);
                    }
                elseif(Customer::where('grave3', 'like', '%'.$grave.'%')
                    ->exists())
                    {
                        // $query -> where('grave3', 'like', '%'.$grave.'%');
                        session(['grave' => $grave]);
                    }
                elseif(Customer::where('grave4', 'like', '%'.$grave.'%')
                    ->exists())
                    {
                        // $query -> where('grave4', 'like', '%'.$grave.'%');
                        session(['grave' => $grave]);
                    }
                elseif(Customer::where('grave5', 'like', '%'.$grave.'%')
                    ->exists())
                    {
                        // $query -> where('grave5', 'like', '%'.$grave.'%');
                        session(['grave' => $grave]);
                    }
                elseif(Customer::where('grave6', 'like', '%'.$grave.'%')
                    ->exists())
                    {
                        // $query -> where('grave6', 'like', '%'.$grave.'%');
                        session(['grave' => $grave]);
                    }
                }
                if(!empty($repair)) {
                    if(Customer::where('repair1', 'like', '%'.$repair.'%')
                        ->exists())
                        {
                            // $query -> where('repair1', 'like', '%'.$repair.'%');
                            session(['repair' => $repair]);
                        }
                    elseif(Customer::where('repair2', 'like', '%'.$repair.'%')
                        ->exists())
                        {
                            // $query -> where('repair2', 'like', '%'.$repair.'%');
                            session(['repair' => $repair]);
                        }
                    elseif(Customer::where('repair3', 'like', '%'.$repair.'%')
                        ->exists())
                        {
                            // $query -> where('repair3', 'like', '%'.$repair.'%');
                            session(['repair' => $repair]);
                        }
                    elseif(Customer::where('repair4', 'like', '%'.$repair.'%')
                        ->exists())
                        {
                            // $query -> where('repair4', 'like', '%'.$repair.'%');
                            session(['repair' => $repair]);
                        }
                    elseif(Customer::where('repair5', 'like', '%'.$repair.'%')
                        ->exists())
                        {
                            // $query -> where('repair5', 'like', '%'.$repair.'%');
                            session(['repair' => $repair]);
                        }
                    elseif(Customer::where('repair6', 'like', '%'.$repair.'%')
                        ->exists())
                        {
                            // $query -> where('repair6', 'like', '%'.$repair.'%');
                            session(['repair' => $repair]);
                        }
                    }
                    if(!empty($baltar)) {
                        if(Customer::where('baltar1', 'like', '%'.$baltar.'%')
                            ->exists())
                            {
                                // $query -> where('baltar1', 'like', '%'.$baltar.'%');
                                session(['baltar' => $baltar]);
                            }
                        elseif(Customer::where('baltar2', 'like', '%'.$baltar.'%')
                            ->exists())
                            {
                                // $query -> where('baltar2', 'like', '%'.$baltar.'%');
                                session(['baltar' => $baltar]);
                            }
                        elseif(Customer::where('baltar3', 'like', '%'.$baltar.'%')
                            ->exists())
                            {
                                // $query -> where('baltar3', 'like', '%'.$baltar.'%');
                                session(['baltar' => $baltar]);
                            }
                        elseif(Customer::where('baltar4', 'like', '%'.$baltar.'%')
                            ->exists())
                            {
                                // $query -> where('baltar4', 'like', '%'.$baltar.'%');
                                session(['baltar' => $baltar]);
                            }
                        elseif(Customer::where('baltar5', 'like', '%'.$baltar.'%')
                            ->exists())
                            {
                                // $query -> where('baltar5', 'like', '%'.$baltar.'%');
                                session(['baltar' => $baltar]);
                            }
                        elseif(Customer::where('baltar6', 'like', '%'.$baltar.'%')
                            ->exists())
                            {
                                // $query -> where('baltar6', 'like', '%'.$baltar.'%');
                                session(['baltar' => $baltar]);
                            }
                        }
                        if(!empty($bafittings)) {
                            if(Customer::where('bafittings1', 'like', '%'.$bafittings.'%')
                                ->exists())
                                {
                                    // $query -> where('bafittings1', 'like', '%'.$bafittings.'%');
                                    session(['bafittings' => $bafittings]);
                                }
                            elseif(Customer::where('bafittings2', 'like', '%'.$bafittings.'%')
                                ->exists())
                                {
                                    // $query -> where('bafittings2', 'like', '%'.$bafittings.'%');
                                    session(['bafittings' => $bafittings]);
                                }
                            elseif(Customer::where('bafittings3', 'like', '%'.$bafittings.'%')
                                ->exists())
                                {
                                    // $query -> where('bafittings3', 'like', '%'.$bafittings.'%');
                                    session(['bafittings' => $bafittings]);
                                }
                            elseif(Customer::where('bafittings4', 'like', '%'.$bafittings.'%')
                                ->exists())
                                {
                                    // $query -> where('bafittings4', 'like', '%'.$bafittings.'%');
                                    session(['bafittings' => $bafittings]);
                                }
                            elseif(Customer::where('bafittings5', 'like', '%'.$bafittings.'%')
                                ->exists())
                                {
                                    // $query -> where('bafittings5', 'like', '%'.$bafittings.'%');
                                    session(['bafittings' => $bafittings]);
                                }
                            elseif(Customer::where('bafittings6', 'like', '%'.$bafittings.'%')
                                ->exists())
                                {
                                    // $query -> where('bafittings6', 'like', '%'.$bafittings.'%');
                                    session(['bafittings' => $bafittings]);
                                }
                            }
            
            // if(!empty($repair)) {
            //     session(['repair' => $repair]);
            //     $query -> where('repair1', 'like', '%'.$repair.'%')
            //     -> orwhere('repair2', 'like', '%'.$repair.'%')
            //     -> orwhere('repair3', 'like', '%'.$repair.'%')
            //     -> orwhere('repair4', 'like', '%'.$repair.'%')
            //     -> orwhere('repair5', 'like', '%'.$repair.'%')
            //     -> orwhere('repair6', 'like', '%'.$repair.'%');
            // }
            // if(!empty($baltar)) {
            //     session(['baltar' => $baltar]);
            //     $query -> where('baltar1', 'like', '%'.$baltar.'%')
            //     -> orwhere('baltar2', 'like', '%'.$baltar.'%')
            //     -> orwhere('baltar3', 'like', '%'.$baltar.'%')
            //     -> orwhere('baltar4', 'like', '%'.$baltar.'%')
            //     -> orwhere('baltar5', 'like', '%'.$baltar.'%')
            //     -> orwhere('baltar6', 'like', '%'.$baltar.'%');
            // }
            // if(!empty($bafittings)) {
            //     session(['bafittings' => $bafittings]);
            //     $query -> where('bafittings1', 'like', '%'.$bafittings.'%')
            //     -> orwhere('bafittings2', 'like', '%'.$bafittings.'%')
            //     -> orwhere('bafittings3', 'like', '%'.$bafittings.'%')
            //     -> orwhere('bafittings4', 'like', '%'.$bafittings.'%')
            //     -> orwhere('bafittings5', 'like', '%'.$bafittings.'%')
            //     -> orwhere('bafittings6', 'like', '%'.$bafittings.'%');
            // }
            if(!empty($memo)) {
                session(['memo' => $memo]);
                // $query -> where('memo', 'like', '%'.$memo.'%');
            }
            if(!empty($pg)) {
                $pga=$query->count();
                $dba=Customer::get()->count();
                if($pga === $dba) {
                    session(['pg'=>25]);
                } else {
                    session(['pg'=>$pga]);
                }
            }
            // dd($pg);
            // dd($query);

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
