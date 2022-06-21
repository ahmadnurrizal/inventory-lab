<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
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
 * @property BorrowingItem $borrowing_item
 * @property User $user
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

	public function borrowing_item()
	{
		return $this->belongsTo(BorrowingItem::class, 'borrowing_id', 'borrowing_id');
	}

	public function user()
	{
		return $this->hasOne(User::class, 'user_id', 'user_id');
	}
}
