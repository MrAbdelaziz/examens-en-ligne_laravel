<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Subcategorie extends Model {
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'description', 'tags', 'parent', 'created_at', 'updated_at', 'deleted_at',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [  ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [  ];
    /**
     * Eloquent Relationships
     *
     */
    /**
     * Eloquent Relationships
     *
     */
    public function exams(){
        return $this->hasMany('App\Exam');
    }
    
}
