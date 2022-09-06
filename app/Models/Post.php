<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['category', 'author', 'comments'];

//    protected $fillable = ['title', 'excerpt', 'body', 'slug'];

    public function scopeFilter($query, array $filters) // Post::newQuery()->filter
    {
//        $query->when($filters['search'] ?? false, function ($query, $search) {
//            $query
//                ->where('title', 'like', '%'. $search . '%')
//                ->orWhere('body', 'like', '%'. $search . '%');
//        });

        // $query SELECT * FROM posts

        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(fn($query) =>
                $query->where('title', 'like', '%'. $search . '%')
                ->orWhere('body', 'like', '%'. $search . '%')
            );
        });

//        $query->when($filters['search'] ?? false, fn($query, $search) =>
//            $query->where(fn($query) =>
//            $query->where('title', 'like', '%'. $search . '%')
//                ->orWhere('body', 'like', '%'. $search . '%')
//            )
//        );



//        $query->when($filters['category'] ?? false, function ($query, $category) {
//            $query
//                ->whereExists(fn($query) =>
//                    $query->from('categories')
//                        ->whereColumn('categories.id', 'posts.category_id')
//                        ->where('categories.slug', $category)
//                );
//        });


        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->whereHas('category', fn ($query) =>
                $query->where('slug', $category)
            );
        });

        $query->when($filters['author'] ?? false, function ($query, $author) {
            $query->whereHas('author', fn ($query) =>
            $query->where('username', $author)
            );
        });


//        $query->when($filters['category'] ?? false, fn($query, $category) =>
//            $query
//                ->whereExists(fn($query) =>
//                $query->from('categories')
//                    ->whereColumn('categories.id', 'posts.category_id')
//                    ->where('categories.slug', $category))
//        );
    }

//    public function scopeFilter($query, array $filters) // Post::newQuery()->filter
//    {
//        if ($filters['search'] ?? false) {
//            $query
//                ->where('title', 'like', '%'. request('search') . '%')
//                ->orWhere('body', 'like', '%'. request('search') . '%');
//        }
//    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function cart()
    {
        return $this->belongsTo(cart::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
