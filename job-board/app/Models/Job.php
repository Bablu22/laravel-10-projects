<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'location', 'salary', 'experience', 'category'];

    public static array $experience = ['entry', 'intermediate', 'senior'];
    public static array $category = ['Backend', 'Frontend', 'Fullstack', 'DevOps', 'QA'];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function hasUserapplied(Authenticatable | User | int $user): bool
    {
        return $this->jobApplications()->where('user_id', $user->id ?? $user)->exists();
    }

    public function scopeFilter(EloquentBuilder | QueryBuilder $query, array $filters): EloquentBuilder | QueryBuilder
    {
        return $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhereHas('employer', fn($query) =>
                        $query->where('company_name', 'like', '%' . $search . '%')
                    )
            )
        )->when($filters['category'] ?? false, fn($query, $category) =>
            $query->where('category', $category)
        )->when($filters['experience'] ?? false, fn($query, $experience) =>
            $query->where('experience', $experience)
        )->when($filters['salary'] ?? false, fn($query, $min_salary) =>
            $query->where('min_salary', '>=', $min_salary)
        )->when($filters['max_salary'] ?? false, fn($query, $max_salary) =>
            $query->where('salary', '<=', $max_salary)
        );
    }

}
