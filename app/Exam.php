<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Exam extends Model {
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'description',
        'tags',
        'cover',
        'number_questions',
        'duration',
        'minimum_score',
        'author',
        'subcategory',
        'is_completed_writing',
        'status  Croissant 1',
        'created_at',
        'updated_at',
        'deleted_at',
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
    public function user(){
        return $this->belongsTo('App\User', 'author');
    }
    public function subcategorie(){
        return $this->belongsTo('App\Subcategorie', 'subcategory');
    }
    public function examinations(){
        return $this->hasMany('App\Examination');
    }
}
