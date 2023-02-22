<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    public function ledgers(): HasMany
    {
        return $this->hasMany(Ledger::class, 'transaction_id');
    }

    public function transaction(): BelongsTo
    {
        return $this->BelongsTo(Transaction::class, 'transaction_id');
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
