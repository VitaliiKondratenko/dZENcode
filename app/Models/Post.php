<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    protected $commentsPerPage = 2;

    public function comments()
    {
        $sortby = (isset($_GET['sortby'])) ? $_GET['sortby'] : 'created_at';
        $sortDirection = (isset($_GET['sort'])) ? $_GET['sort'] : 'desc';
        $limit = (isset($_GET['page'])) ? $this->commentsPerPage*($_GET['page']-1) : 0;
        return $this->hasMany(Comment::class)->whereNull('parent_id')
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->select('comments.*','users.name',  'users.email')
        ->orderBy($sortby, $sortDirection)
        ->offset($limit)
        ->limit($this->commentsPerPage);
    }

    public function pagination(){
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCommentsPerPage(){
        return $this->commentsPerPage;
    }
}
