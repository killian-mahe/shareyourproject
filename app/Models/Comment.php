<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The name of the database.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content'];

    /**
     * Get the user that wrote the comment.
     */
    public function author()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the post from where this comment was written.
     */
    public function post()
    {
        return $this->belongsTo('App\Model\Post');
    }

    /**
     * Get the HTML formated comment description
     * @param string $value
     * @return string
     */
    public function getFormatedContentAttribute()
    {
        return nl2br($this->content);
    }
}
