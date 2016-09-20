<?php
namespace App\Models;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends BaseModel implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Доступы ползователя
     * @return mixed
     */
    public function access() {
        return $this->morphedByMany('App\Models\AccessItems', 'accesses')->orderBy('sort', 'asc');
    }

    /**
     * Роль пользователя
     * @return mixed
     */
    public function role() {
        return $this->belongsTo('App\Models\Role');
    }

    /**
     * Руководитель (для менеджеров)
     * @return mixed
     */
    public function head() {
        return $this->belongsTo('App\Models\User', 'leader');
    }

    /**
     * Подчиненные
     * @return mixed
     */
    public function subordinates() {
        return $this->hasMany('App\Models\User', 'leader');
    }

    /**
     * Дом (для менеджеров)
     * @return mixed
     */
    public function house() {
        return $this->hasOne('App\Models\House', 'manager_id');
    }

    public function hasRole($roles) {
        $this->have_role = $this->getUserRole();
        // Check if the user is a root account
        if(!isset($this->have_role) && empty($this->have_role)) {
            return false;
        }
        if ($this->have_role->name == 'Admin') {
            return true;
        }
        if (is_array($roles)) {
            foreach ($roles as $need_role) {
                if ($this->checkIfUserHasRole($need_role)) {
                    return true;
                }
            }
        } else {
            return $this->checkIfUserHasRole($roles);
        }
        return false;
    }

    private function getUserRole() {
        return $this->role()->getResults();
    }

    private function checkIfUserHasRole($need_role) {
        return (strtolower($need_role) == strtolower($this->have_role->slug)) ? true : false;
    }
}
