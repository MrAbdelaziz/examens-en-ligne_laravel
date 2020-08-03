<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Answer extends Model {
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'content',
        'is_correct_answer',
        'answers_order',
        'question_of_answer',
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
}
