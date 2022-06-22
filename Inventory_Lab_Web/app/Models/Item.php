<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 *
 * @property int $item_id
 * @property string $item_name
 * @property string $description
 * @property string $category
 * @property int $quantity
 * @property string $storage
 * @property string $image_url
 * @property string $status
 * @property Carbon $created_at
 *
 * @property Collection|Borrowing[] $borrowings
 *
 * @package App\Models
 */
class Item extends Model
{
    use HasFactory;

    protected $table = 'items';
    protected $primaryKey = 'item_id';
    public $timestamps = false;

    protected $casts = [
        'quantity' => 'int'
    ];

    protected $fillable = [
        'item_name',
        'description',
        'category',
        'quantity',
        'storage',
        'image_url',
        'status'
    ];

    public function borrowing_item()
    {
        return $this->hasOne(BorrowingItem::class);
    }
	public function borrowings()
	{
		return $this->belongsToMany(Borrowing::class, 'borrowing_items', 'borrowing_id', 'item_id');
	}
}
