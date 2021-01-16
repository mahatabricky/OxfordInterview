<?php

namespace App;
use App\FinancialOrganization;
use Illuminate\Database\Eloquent\Model;

class BankAccounts extends Model
{
    protected $fillable = [
        'financial_organization_id', 'store_id','account_name','account_no','branch'
        ,'account_type','swift_code','route_no',
    ];

    public function organization()
    {
        return $this->belongsTo(FinancialOrganization::class,'financial_organization_id');

    }
}
