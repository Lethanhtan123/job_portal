<?php

use App\Models\Candidate;
use App\Models\Company;

if (!function_exists('hasError')) {
    function hasError($errors, string $name): ?String
    {
        return $errors->has($name) ? 'is-invalid' : '';
    }
}


/** Set sidebar active */
if (!function_exists('setSidebarActive')) {
    function setSidebarActive(array $routes): ?String
    {
        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return 'active';
            }
        }
        return null;
    }
}

/** check profile completion */
if (!function_exists('isCompanyProfileComplete')) {
    function isCompanyProfileComplete(): bool
    {
        $requiredFields = ['logo', 'bio', 'name', 'establishment_date', 'phone', 'email', 'country'];
        $companyProfile = Company::where('user_id', auth()->user()->id)->first();

        foreach ($requiredFields as $field) {
            if (empty($companyProfile->{$field})) {
                return false;
            }
        }

        return true;
    }
}
/** format date */
if (!function_exists('formatDate')) {
    function formatDate(?string $date): ?string
    {
        if ($date) {
            return date('d/m/Y',  strtotime($date));
        }

        return null;
    }
}



/** format location */
if (!function_exists('formatLocation')) {
    function formatLocation($country = null, $city = null, $district = null, $address = null): string
    {
        $location = '';

        if ($address) {
            $location .= $address;
        }

        if ($district) {
            $location .= $address ? ', ' . $district : $district;
        }

        if ($city) {
            $location .= ($address || $district) ? ', ' . $city : $city;
        }

        if ($country) {
            $location .= ($address || $district || $city) ? ', ' . $country : $country;
        }


        return $location;
    }
}

if (!function_exists('isCompanyProfileComplete')) {
    function isCompanyProfileComplete(): bool
    {
        $requiredFields = ['logo', 'banner', 'bio', 'name', 'industry_type_id', 'establishment_date', 'phone', 'email', 'country'];
        $companyProfile = Company::where('user_id', auth()->user()->id)->first();

        foreach ($requiredFields as $field) {
            if (empty($companyProfile->{$field})) {
                return false;
            }
        }

        return true;
    }
}

if (!function_exists('isCandidateProfileComplete')) {
    function isCandidateProfileComplete(): bool
    {
        $requiredFields = ['experience_id', 'profession_id', 'image', 'full_name', 'birth_date', 'gender', 'bio', 'marital_status', 'country', 'status'];

        $candidateProfile = Candidate::where('user_id', auth()->user()->id)->first();

        foreach ($requiredFields as $field) {
            if (empty($candidateProfile->{$field})) {
                return false;
            }
        }

        return true;
    }
}
