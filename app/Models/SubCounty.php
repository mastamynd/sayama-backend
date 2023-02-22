<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCounty extends Model
{
	protected $table = 'ussd_subcounty';

	public function region(): BelongsTo
	{
		return $this->belongsTo(County::class, 'county_id');
	}
}
