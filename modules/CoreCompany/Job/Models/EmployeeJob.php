<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Models;

use BasePackage\Shared\Traits\BaseFilterable;
use BasePackage\Shared\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Modules\CoreCompany\Company\Models\Company;
use Modules\CoreCompany\Job\Database\factories\JobFactory;
use Modules\CoreUser\ApplyJob\Models\ApplyJob;
use Modules\CoreUser\Archived\Models\Archived;
use Modules\CoreUser\Saved\Models\Saved;
use Modules\CoreUser\UserSkill\Models\Skill;
use Modules\Shared\Category\Models\Category;

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
        'skill_ids',
        'employee_description',
        'team_description',
        'interview',
        'salary_form',
        'salary_to',
        'pay',
        'category_ids',
        'type',
        'status',
    ];

    protected $casts = [
        'id' => 'string',
        'skill_ids' => 'json',
        'interview' => 'json',
        'category_ids' => 'json',
    ];

    protected static function newFactory(): JobFactory
    {
        return JobFactory::new();
    }

    /**
     * Get the skills associated with the job.
     * Note: This is an accessor, not a true Eloquent relationship.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function skills()
    {
        // Check if skill_ids is not empty to avoid an unnecessary query
        if (empty($this->skill_ids)) {
            return collect(); // Return an empty collection
        }

        return Skill::whereIn('id', $this->skill_ids)->get();
    }

    /**
     * Get the categories associated with the job.
     * Note: This is an accessor, not a true Eloquent relationship.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function categories()
    {
        // Check if category_ids is not empty
        if (empty($this->category_ids)) {
            return collect(); // Return an empty collection
        }

        return Category::whereIn('id', $this->category_ids)->get();
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function applyJobUser()
    {
        return $this->hasOne(ApplyJob::class, 'employee_job_id')->where('user_id', auth('api_user')->user()->id);
    }

    public function applyJobCompany()
    {
        return $this->hasOne(ApplyJob::class, 'employee_job_id')->where('company_id', auth('api_company')->user()->id);
    }

    public function archive(): MorphOne
    {
        return $this->morphOne(Archived::class, 'archivable')->where('user_id', auth('api_user')->user()->id);
    }

    public function userSave(): MorphOne
    {
        return $this->morphOne(Saved::class, 'savable')->where('user_id', auth('api_user')->user()->id);
    }
}
