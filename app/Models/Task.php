<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'priority_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    public function scopeHandleSort(Builder $query, string $column)
    {
        $query
            ->when($column === 'name', function($query) {
                $query->orderBy('name');
            })
            ->when($column === 'time', function($query) {
                $query->latest();
            })
            ->when($column === 'priority', function($query) {
                $query->orderByRaw('ISNULL(priority_id), priority_id ASC');
            });
    }
}
