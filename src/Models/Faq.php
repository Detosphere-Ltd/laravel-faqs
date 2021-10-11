<?php

namespace DetosphereLtd\LaravelFaqs\Models;

use DetosphereLtd\LaravelFaqs\Traits\HasUuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    use HasFactory, HasUuid, SoftDeletes;

    /**
     * The attributes that are fillable.
     *
     * @var array
     */
    protected $fillable = [
        'question',
        'answer',
        'type',
        'helpful_yes',
        'helpful_no',
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
        return \DetosphereLtd\LaravelFaqs\Database\Factories\FaqFactory::new();
    }

    public function scopeType(Builder $query, string $type)
    {
        $query->where('type', $type);
    }
}
