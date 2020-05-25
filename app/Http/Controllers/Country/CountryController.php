<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CountryModel;

class CountryController extends Controller
{
    public function country() {
        return response()->json(CountryModel::get(), 200);
    }

    public function countryById($id) {
        return response()->json(CountryModel::find($id), 200);
    }

    public function countrySave(Request $req) {
        $country = CountryModel::create($req->all());
        return response()->json($country, 201);
    }

    public function countryEdit(Request $req, CountryModel $country) {
        $country->update($req->all());
        return response()->json($country, 200);
    }

    public function countryDelete(Request $req, CountryModel $country) {
        $country->delete();
        return response()->json('', 204);
    }
}
