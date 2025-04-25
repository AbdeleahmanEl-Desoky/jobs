<?php

declare(strict_types=1);

namespace Modules\Shared\City\Models;

use BasePackage\Shared\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shared\City\Database\factories\CityFactory;
use BasePackage\Shared\Traits\BaseFilterable;
use Modules\Shared\Country\Models\Country;
use Modules\Shared\State\Models\State;

//use BasePackage\Shared\Traits\HasTranslations;

class City extends Model
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

    protected static function newFactory(): CityFactory
    {
        return CityFactory::new();
    }
    public function state()
    {
        return $this->belongsTo(State::class,"state_id");

    }
    public function country()
    {
        return $this->belongsTo(Country::class , "country_id");
    }
}
