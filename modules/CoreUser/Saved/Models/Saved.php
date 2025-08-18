<?php

declare(strict_types=1);

namespace Modules\CoreUser\Saved\Models;

use BasePackage\Shared\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use BasePackage\Shared\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Relations\MorphTo;
class Saved extends Model
{
    use HasFactory;
    use UuidTrait;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'saved';

    protected $fillable = [
        'savable_id',
        'savable_type',
        'user_id',
        'saved_at',
    ];

    protected $casts = [
        'id' => 'string',
        'saved_at' => 'datetime',
    ];

    /**
     * Get the parent savable
     */
    public function savable(): MorphTo
    {
        return $this->morphTo();
    }
}
