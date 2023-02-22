<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ledger extends Model
{
	public function transaction(): BelongsTo
	{
		return $this->belongsTo(Transaction::class, 'transaction_id');
	}

	public function member(): BelongsTo
	{
			return $this->belongsTo(Member::class, 'member_id');
	}
}
