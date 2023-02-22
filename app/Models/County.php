<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class County extends Model
{
	protected $table = "ussd_county";

	public function region(): BelongsTo
	{
		return $this->belongsTo(Region::class, 'region_id');
	}
}
