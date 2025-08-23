<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Models;

use BasePackage\Shared\Traits\BaseFilterable;
use BasePackage\Shared\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // ADD THIS IMPORT

use Modules\CoreCompany\Company\Models\Company;
use Modules\CoreCompany\Job\Database\factories\JobFactory;
use Modules\CoreUser\ApplyJob\Models\ApplyJob;
use Modules\CoreUser\Archived\Models\Archived;
use Modules\CoreUser\Saved\Models\Saved;
use Modules\Shared\Skill\Models\Skill;
use Modules\Shared\Category\Models\Category;
use Modules\Shared\City\Models\City;
use Modules\Shared\Country\Models\Country;
use Modules\Shared\JobTitle\Models\JobTitle;

class EmployeeJob extends Model
{
    use HasFactory;
    use UuidTrait;
    use BaseFilterable;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = "employee_jobs";
    protected $fillable = [
        'company_id',
        'job_title_id',
        'position_description',
        'company_description',
        'employee_description',
        'team_description',
        'interview',
        'salary_form',
        'salary_to',
        'pay',
        'type',
        'status',
        'country_id',
        'city_id',
        'views_count',
        'marke'
    ];

    protected $casts = [
        'id' => 'string',
        'interview' => 'json',
        'views_count' => 'integer',
    ];

    protected static function newFactory(): JobFactory
    {
        return JobFactory::new();
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function jobTitle(): BelongsTo
    {
        return $this->belongsTo(JobTitle::class, 'job_title_id');
    }

    /**
     * Get the skills associated with the job via pivot table.
     */
    public function skills(): BelongsToMany // Note: Renamed from your old accessor
    {
        return $this->belongsToMany(Skill::class, 'employee_job_skill', 'employee_job_id', 'skill_id');
    }

    /**
     * Get the categories associated with the job via pivot table.
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'employee_job_category', 'employee_job_id', 'category_id');
    }

    public function applyJobUser()
    {
        return $this->hasOne(ApplyJob::class)->where('user_id', auth('api_user')->user()->id);
    }

    public function applyJobCompany()
    {
        return $this->hasMany(ApplyJob::class)->where('company_id', auth('api_company')->user()->id);
    }

    public function archive(): MorphOne
    {
        return $this->morphOne(Archived::class, 'archivable')->where('user_id', auth('api_user')->user()->id);
    }

    public function userSave(): MorphOne
    {
        return $this->morphOne(Saved::class, 'savable')->where('user_id', auth('api_user')->user()->id);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
