<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

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
     * User Roles
     * @return mixed
     */
    public function roles()
    {
        return $this->hasMany('Tsawler\Vcms5\models\UserRole');
    }


    /**
     * User Prefs
     *
     * @return mixed
     */
    public function prefs()
    {
        return $this->hasOne('Tsawler\Vcms5\models\UserPref');
    }


    /**
     * Check if User has role
     *
     * @param $role_id
     * @return bool
     */
    public function hasRole($role_id)
    {
        return in_array($role_id, DB::table(Config::get('vcms5.user_roles_table'))
            ->where('user_id', $this->id)
            ->lists('role'));
    }

}
