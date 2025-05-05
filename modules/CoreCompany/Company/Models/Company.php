<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Company\Models;

use BasePackage\Shared\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CoreCompany\Company\Database\factories\CompanyFactory;
use BasePackage\Shared\Traits\BaseFilterable;
//use BasePackage\Shared\Traits\HasTranslations;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Shared\City\Models\City;
use Modules\Shared\CompanySize\Models\CompanySize;
use Modules\Shared\Country\Models\Country;
use Modules\Shared\Field\Models\Field;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Company extends Authenticatable implements JWTSubject , HasMedia
{
    use HasFactory;
    use UuidTrait;
    use BaseFilterable;
    use InteractsWithMedia;
    //use HasTranslations;
    //use SoftDeletes;

    //public array $translatable = [];

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'type',
        'password',
        'last_name',
        'phonecode',
        'country_id',
        'city_id',
        'postal_code',
        'minimum_salary_amount',
        'payment_period',
        'about',
        'field_id',
        'company_size_id',
    ];

    protected $casts = [
        'id' => 'string',
    ];
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    protected static function newFactory(): CompanyFactory
    {
        return CompanyFactory::new();
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
    public function companySize()
    {
        return $this->belongsTo(CompanySize::class);
    }
    public function phoneCode()
    {
        return $this->belongsTo(Country::class,'phonecode','phonecode');
    }
}
