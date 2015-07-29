<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends BaseModel implements AuthenticatableContract, CanResetPasswordContract
{
	use Authenticatable, CanResetPassword, HasJsonFields;

	protected $appends = [
		'address',
		'description',
		'gender',
		'phone_number',
		'username',
	];

	protected $jsonColumns = [
		'meta',
	];

	protected $jsonAttributes = [
		'address'      => 'meta',
		'description'  => 'meta',
		'gender'       => 'meta',
		'phone_number' => 'meta',
		'username'     => 'meta',
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * This user belongs to a company
	 * @return Relation
	 */
	public function company()
	{
		return $this->belongsTo('App\Company');
	}

	/**
	 * Find user by email address
	 * @param  string $email
	 * @return User
	 */
	public static function findByEmail($email)
	{
		return self::where('email', $email)->first();
	}

    /**
     * Set a given attribute on the known JSON elements.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function setAttribute($key, $value)
    {
        if (array_key_exists($key, $this->jsonAttributes) !== false) {
            $this->setJsonAttribute($this->jsonAttributes[$key], $key, $value);
            return;
        }
        if ( !in_array($key, $this->columns()) )
        {
        	$this->setJsonAttribute($this->jsonColumns[$key], $key, $value);
        	return;
        }

        parent::setAttribute($key, $value);
    }

    public function beforeSave()
    {
    	if ( $this->isDirty('password') )
    	{
    		$this->password = \Hash::make($this->password);
    	}
    	return true;
    }
}
