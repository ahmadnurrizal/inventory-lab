<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BorrowingItem
 *
 * @property int $borrowing_id
 * @property int $item_id
 *
 * @property Borrowing $borrowing
 * @property Item $item
 *
 * @package App\Models
 */
class BorrowingItem extends Model
{
	protected $table = 'borrowing_items';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'borrowing_id' => 'int',
		'item_id' => 'int'
	];

	protected $fillable = [
		'borrowing_id',
		'item_id'
	];

	public function borrowing()
	{
		return $this->belongsTo(Borrowing::class);
	}

	public function item()
	{
		return $this->belongsTo(Item::class);
	}
}
