<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable {
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var arraySortable
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'password',
        'cover',
        'avatar',
        'birthday',
        'bio',
        'address',
        'city',
        'country',
        'competence',
        'school',
        'phone',
        'gender',
        'status',
        'role_id',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Eloquent Relationships
     *
     */
    public function exams(){
        return $this->hasMany('App\Exam');
    }
    public function examinations(){
        return $this->hasMany('App\Examination');
    }
}
