<?php

declare(strict_types=1);

namespace Modules\CoreUser\Education\Models;

use BasePackage\Shared\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CoreUser\Education\Database\factories\EducationFactory;
use BasePackage\Shared\Traits\BaseFilterable;
use Modules\Shared\City\Models\City;
use Modules\Shared\Country\Models\Country;
use Modules\Shared\Degree\Models\Degree;
use Modules\Shared\Field\Models\Field;
use Modules\Shared\Specialization\Models\Specialization;
use Modules\Shared\University\Models\University;

//use BasePackage\Shared\Traits\HasTranslations;

class Education extends Model
{
    use HasFactory;
    use UuidTrait;
    use BaseFilterable;
    //use HasTranslations;
    //use SoftDeletes;

    //public array $translatable = [];

    public $incrementing = false;

    protected $keyType = 'string';
    protected $table ='educations';
    protected $fillable = [
        'user_id',
        'degree_id',
        'country_id',
        'city_id',
        'field_id',
        'specialization_id',
        'university_id',
        'date_from',
        'date_to',
        'graduation_grade_type',
        'graduation_grade_value',
        'description',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    protected static function newFactory(): EducationFactory
    {
        return EducationFactory::new();
    }

    public function degree()
    {
        return $this->belongsTo(Degree::class);
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

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
