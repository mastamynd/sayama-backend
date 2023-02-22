<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
  use HasFactory;

  protected $table = 'ussd_member';

  public function ledgers(): HasMany
  {
    return $this->hasMany(Ledger::class, 'member_id');
  }

  public function transactions(): HasMany
  {
    return $this->hasMany(Transaction::class, 'member_id');
  }

  public function region()
  {
    return $this->belongsTo(Region::class, 'region_id');
  }

  public function county()
  {
    return $this->belongsTo(County::class, 'county_id');
  }

  public function account_balance()
  {
    return $this->ledgers->selectRaw('SUM(debit) - SUM(credit) as balance');
  }

  public function sub_county()
  {
    return $this->belongsTo(SubCounty::class, 'subcounty_id');
  }
}
