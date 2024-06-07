<?php

use App\Models\Company;

if(!function_exists('hasError')) {
    function hasError($errors, string $name) : ?String
    {
        return $errors->has($name) ? 'is-invalid' : '';
    }
}


/** Set sidebar active */
if(!function_exists('setSidebarActive')) {
    function setSidebarActive(array $routes) : ?String
    {
        foreach($routes as $route) {
            if(request()->routeIs($route)) {
                return 'active';
            }
        }
        return null;
    }
}

/** check profile completion */
if(!function_exists('isCompanyProfileComplete')) {
    function isCompanyProfileComplete() : bool
    {
        $requiredFields = ['logo', 'bio', 'name', 'establishment_date', 'phone', 'email', 'country'];
        $companyProfile = Company::where('user_id', auth()->user()->id)->first();

        foreach($requiredFields as $field) {
            if(empty($companyProfile->{$field})) {
                return false;

            }
        }

        return true;
    }
}
/** format date */
if(!function_exists('formatDate')) {
    function formatDate(?string $date) : ?string
    {
        if($date) {
            return date('d/m/Y',  strtotime($date));
        }

        return null;
    }
}



/** format location */
if(!function_exists('formatLocation')) {
    function formatLocation($country = null, $city = null,$district = null, $address = null) : string
    {
        $location = '';
        if($country) {
            $location .= $city ? ''.$country : $country;
        }
        if($city) {
            $location .= $district ? ', '.$city : $city;
        }
        if($district) {
            $location .= $address ? ', '.$district : $district;
        }
        if($address) {
            $location .= $address;
        }

        return $location;
    }
}
