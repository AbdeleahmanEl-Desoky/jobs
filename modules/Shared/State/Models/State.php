<?php

declare(strict_types=1);

namespace Modules\Shared\State\Models;

use BasePackage\Shared\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shared\State\Database\factories\StateFactory;
use BasePackage\Shared\Traits\BaseFilterable;
use Modules\Shared\City\Models\City;
use Modules\Shared\Country\Models\Country;

//use BasePackage\Shared\Traits\HasTranslations;

class State extends Model
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
    ];

    protected $casts = [
        'id' => 'string',
    ];

    protected static function newFactory(): StateFactory
    {
        return StateFactory::new();
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }


}
