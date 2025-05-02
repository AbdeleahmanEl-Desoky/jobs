<?php

declare(strict_types=1);

namespace Modules\CoreUser\Experience\Models;

use BasePackage\Shared\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CoreUser\Experience\Database\factories\ExperienceFactory;
use BasePackage\Shared\Traits\BaseFilterable;
use Modules\Shared\City\Models\City;
use Modules\Shared\CompanySize\Models\CompanySize;
use Modules\Shared\Country\Models\Country;
use Modules\Shared\Field\Models\Field;
use Modules\Shared\JobTitle\Models\JobTitle;

//use BasePackage\Shared\Traits\HasTranslations;

class Experience extends Model
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
        'user_id',
        'position_title',
        'company_name',
        'company_field_id',
        'company_size_id',
        'job_title_id',
        'country_id',
        'city_id',
        'field_id',
        'date_from',
        'date_to',
        'description',
        'find_job',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    protected static function newFactory(): ExperienceFactory
    {
        return ExperienceFactory::new();
    }


    // Relationships
    public function companyField()
    {
        return $this->belongsTo(Field::class);
    }

    public function companySize()
    {
        return $this->belongsTo(CompanySize::class);
    }

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class);
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
}
