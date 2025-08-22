<?php

declare(strict_types=1);

namespace Modules\CoreCompany\Job\Filters;

use BasePackage\Shared\Filters\SearchModelFilter;

class EmployeeJobFilter extends SearchModelFilter
{
    public $relations = [];

    public function company($company_id)
    {
        return $this->where('company_id', $company_id);
    }

    public function jobTitle($job_title_id)
    {
        return $this->where('job_title_id', $job_title_id);
    }

    public function country($country_id)
    {
        return $this->where('country_id', $country_id);
    }

    public function city($city_id)
    {
        return $this->where('city_id', $city_id);
    }

    public function positionDescription($value)
    {
        return $this->where('position_description', 'like', "%{$value}%");
    }

    public function companyDescription($value)
    {
        return $this->where('company_description', 'like', "%{$value}%");
    }

    public function skills($value)
    {
        if (is_string($value) && str_starts_with($value, '[')) {
            $decoded = json_decode($value, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $value = $decoded;
            }
        }

        if (is_array($value)) {
            return $this->where(function ($q) use ($value) {
                foreach ($value as $skill) {
                    $q->orWhereJsonContains('skill_ids', $skill);
                }
            });
        }

        return $this->whereJsonContains('skill_ids', $value);
    }

    public function employeeDescription($value)
    {
        return $this->where('employee_description', 'like', "%{$value}%");
    }

    public function teamDescription($value)
    {
        return $this->where('team_description', 'like', "%{$value}%");
    }

    public function interview($value)
    {
        return $this->whereJsonContains('interview', $value);
    }

    public function salaryForm($value)
    {
        return $this->where('salary_form', '>=', $value);
    }

    public function salaryTo($value)
    {
        return $this->where('salary_to', '<=', $value);
    }

    public function pay($value)
    {
        return $this->where('pay', $value);
    }

    public function categoryIds($value)
    {
        return $this->whereJsonContains('category_ids', $value);
    }

    public function type($type)
    {
        return $this->where('type', $type);
    }

    public function status($status)
    {
        return $this->where('status', $status);
    }

     public function search(string $value)
    {
        $searchTerm = '%' . $value . '%';

        return $this->where(function ( $query) use ($searchTerm) {
            $query->where('position_description', 'like', $searchTerm)
                  ->orWhere('company_description', 'like', $searchTerm)
                  ->orWhere('employee_description', 'like', $searchTerm)
                  ->orWhere('team_description', 'like', $searchTerm)
                ->orWhere('type', 'like', $searchTerm)
                ->orWhere('status', 'like', $searchTerm);

            $query->orWhereHas('company', function ( $q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm);
            });

            $query->orWhereHas('jobTitle', function ( $q) use ($searchTerm) {
                    $q->whereHas('translations',function($q) use ($searchTerm){
                    $q->where('content', 'like', $searchTerm);
                });
            });

            $query->orWhereHas('country', function ( $q) use ($searchTerm) {
                    $q->where('name', 'like', $searchTerm)
                    ->orWhere('native', 'like', $searchTerm);
                });
            });

            $query->orWhereHas('skills', function ( $q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm);
            });

            $query->orWhereHas('categories', function ( $q) use ($searchTerm) {
                $q->whereHas('translations',function($q) use ($searchTerm){
                    $q->where('content', 'like', $searchTerm);
                });
            });

        });
    }

}

