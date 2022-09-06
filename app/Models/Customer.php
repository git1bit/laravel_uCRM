<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public function scopeSearchCustomers($query, $input = null)
    {
        if(!empty($input)){
            if(Customer::where('s_name1', 'like', $input . '%' )
            ->orWhere('f_name1', 'like', $input . '%')->exists())
            {
                return $query->where('s_name1', 'like', $input . '%' )
                ->orWhere('f_name1', 'like', $input . '%');
            }
        }
    }

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
