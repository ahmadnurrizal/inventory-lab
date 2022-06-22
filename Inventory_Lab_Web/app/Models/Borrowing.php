<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Borrowing
 *
 * @property int $borrowing_id
 * @property int $user_id
 * @property Carbon $created_at
 * @property Carbon $return_at
 * @property string $status
 *
 * @property User $user
 * @property Collection|Item[] $items
 *
 * @package App\Models
 */
class Borrowing extends Model
{
	protected $table = 'borrowings';
	protected $primaryKey = 'borrowing_id';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $dates = [
		'return_at'
	];

	protected $fillable = [
		'user_id',
		'return_at',
		'status'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function items()
	{
		return $this->belongsToMany(Item::class, 'borrowing_items', 'borrowing_id', 'item_id');
	}
}
