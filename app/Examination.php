<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Examination extends Model {
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['possible_start_exam_date', 'start_date', 'end_date', 'limit_start_exam_date'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'exam_id',
        'registration_status',
        'possible_start_exam_date',
        'start_date',
        'nbr_incorrect_answers',
        'end_date',
        'limit_start_exam_date',
        'score',
        'certification_status',
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
    public function exam(){
        return $this->belongsTo('App\Exam', 'exam_id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
