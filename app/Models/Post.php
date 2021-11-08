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

    public function account()
    {
        return $this->belongsTo(Account::class);
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

        $query->when($filters['authorId'] ?? false, fn  ($query, $authorId)  =>
            $query->whereHas('account', fn ($query) =>
                $query->whereHas('author', fn ($query) =>
                    $query->where('user_id', $authorId)
                )
            )
        );

        $query->when($filters['accountId'] ?? false, fn ($query, $accountId) =>
            $query->where('account_id', $accountId)
        );

        $query->when($filters['socialMediaId'] ?? false, fn ($query, $mediaId) =>
            $query->where('social_media_id', $mediaId)
        );

        $query->when($filters['dateStart'] ?? false, fn ($query, $dateStart) =>
            $query->where('date', '>=' , $dateStart)
        );

        $query->when($filters['dateEnd'] ?? false, fn ($query, $dateEnd) =>
            $query->where('date', '<=' , $dateEnd)
        );

        $query->when($filters['listGroupId'] ?? false, fn ($query, $listGroupId) =>
            $query->whereHas('account', fn ($query) =>
                $query->whereHas('author', fn ($query) =>
                    $query->whereHas('listGroups', fn ($query) =>
                        $query->where('list_groups.id', $listGroupId)
                    )
                )
            )
        );
    }
}
