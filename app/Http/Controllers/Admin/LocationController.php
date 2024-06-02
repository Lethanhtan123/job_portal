<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LocationController extends Controller
{
    function getStatesOfCountry(string $countryId) : Response {
        $state = State::select(['id', 'name', 'country_id'])->where('country_id', $countryId)->get();
        return response($state);
    }

    function getDistrictsOfCity(string $cityId) : Response {
        $district = District::select(['id', 'name', 'city_id'])->where('city_id', $cityId)->get();
        return response($district);
    }

    function getCityOfCountry(string $countryId) : Response {
        $cities = City::select(['id', 'name', 'country_id'])->where('country_id', $countryId)->get();
        return response($cities);
    }
}
