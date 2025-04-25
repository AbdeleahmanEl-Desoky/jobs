<?php

declare(strict_types=1);

namespace Modules\Shared\Country\Models;

use BasePackage\Shared\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shared\Country\Database\factories\CountryFactory;
use BasePackage\Shared\Traits\BaseFilterable;
use Modules\Shared\State\Models\State;

//use BasePackage\Shared\Traits\HasTranslations;

class Country extends Model
{
    use HasFactory;
    use UuidTrait;
    use BaseFilterable;
    //use HasTranslations;
    //use SoftDeletes;

    //public array $translatable = [];

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'phonecode',
        'status',
        'sms_driver_id',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    protected static function newFactory(): CountryFactory
    {
        return CountryFactory::new();
    }
    public function scopeActive($query)
    {
        return $query->where("status",1);
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
