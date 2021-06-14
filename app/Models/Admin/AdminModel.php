<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class AdminModel extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;
    use HasRoles;
    protected $guarded = "admin";
    protected $table = "admins";

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeNoSuperAdmin(){
        return $this->whereNotIn('id',[1]);
    }
}
