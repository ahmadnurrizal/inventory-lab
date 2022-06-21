<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $user_id
 * @property string $user_name
 * @property string $email
 * @property string $password
 * @property string $phone_number
 * @property string $address
 * @property string $role
 * 
 * @property Borrowing $borrowing
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	protected $primaryKey = 'user_id';
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'user_name',
		'email',
		'password',
		'phone_number',
		'address',
		'role'
	];

	public function borrowing()
	{
		return $this->belongsTo(Borrowing::class, 'user_id', 'user_id');
	}
}
