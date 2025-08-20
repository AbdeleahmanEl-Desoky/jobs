<?php

declare(strict_types=1);

namespace Modules\CoreUser\UserSkill\Models;

use BasePackage\Shared\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CoreUser\UserSkill\Database\factories\SkillFactory;
use BasePackage\Shared\Traits\BaseFilterable;
use Modules\CoreUser\User\Models\User;
use Modules\Shared\Skill\Models\Skill;

//use BasePackage\Shared\Traits\HasTranslations;

class UserSkill extends Model
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
        'skill_id',
        'user_id',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    protected static function newFactory(): SkillFactory
    {
        return SkillFactory::new();
    }
    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
