<?php

namespace DetosphereLtd\LaravelFaqs\Models;

use AlhajiAki\LaravelUuid\HasUuid;
use DetosphereLtd\LaravelFaqs\Database\Factories\FaqFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use HasFactory;
    use HasUuid;
    use SoftDeletes;

    /**
     * The attributes that are guarded.
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'uuid',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'helpful_yes' => 'integer',
        'helpful_no' => 'integer',
    ];

    protected static function newFactory()
    {
        return FaqFactory::new();
    }

    public function getUuidColumn(): string
    {
        return 'uuid';
    }

    public function scopeType(Builder $query, string $type)
    {
        $query->where('type', $type);
    }
}
