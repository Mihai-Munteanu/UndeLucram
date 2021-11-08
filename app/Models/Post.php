<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'date:d-m-Y',
    ];

    public function author()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function socialMedia()
    {
        return $this->belongsTo(SocialMedia::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
            $query->where(function($query) use($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
                    ->orWhere('link', 'like', '%' . $search . '%');
            })
        );

        $query->when($filters['user'] ?? false, fn  ($query, $user)  =>
            $query->whereHas('author', fn ($query) =>
                $query->whereHas('user', fn ($query) =>
                    $query->where('user_id', $user)
                )
            )
        );

        $query->when($filters['author'] ?? false, fn ($query, $author) =>
            $query->where('account_id', $author)
        );

        $query->when($filters['socialMedia'] ?? false, fn ($query, $media) =>
            $query->where('social_media_id', $media)
        );

        $query->when($filters['dateStart'] ?? false, fn ($query, $dateStart) =>
            $query->where('date', '>=' , $dateStart)
        );

        $query->when($filters['dateEnd'] ?? false, fn ($query, $dateEnd) =>
            $query->where('date', '<=' , $dateEnd)
        );

        $query->when($filters['listGroup'] ?? false, fn ($query, $listGroup) =>
            $query->whereHas('author', fn ($query) =>
                $query->whereHas('user', fn ($query) =>
                    $query->whereHas('listGroups', fn ($query) =>
                        $query->where('list_groups.id', $listGroup)
                    )
                )
            )
        );
    }
}
