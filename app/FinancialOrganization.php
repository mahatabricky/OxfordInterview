<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialOrganization extends Model
{
    public function bankAccount()
    {
        return $this->hasMany(BankAccounts::class);
    }
}
