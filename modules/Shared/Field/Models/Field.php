<?php

declare(strict_types=1);

namespace Modules\Shared\Field\Models;

use BasePackage\Shared\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shared\Field\Database\factories\FieldFactory;
use BasePackage\Shared\Traits\BaseFilterable;
use BasePackage\Shared\Traits\HasTranslations;

class Field extends Model
{
    use HasFactory;
    use UuidTrait;
    use BaseFilterable;
    use HasTranslations;
    //use SoftDeletes;

    public array $translatable = ['name'];

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        // 'name',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    protected static function newFactory(): FieldFactory
    {
        return FieldFactory::new();
    }
}
