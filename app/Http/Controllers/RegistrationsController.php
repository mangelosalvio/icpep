<?php

namespace App\Http\Controllers;

use App\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RegistrationsController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

        $route = "registrations";
        $this->route = $route;

        $this->arr_rules  = [
            'last_name' => 'required',
            'first_name' => 'required',
            'company_name' => 'required',
            'type_of_participant' => 'required',
        ];

        $search_data = [ 'search_url' => $this->route ];

        return view()->share(compact(['search_data','route']));
    }

    public function index(Request $request){
        $keyword = $request->input('keyword');

        if ( $keyword ) {
            $registrations = Registration::where('last_name','like',"%$keyword%")
                ->orWhere('first_name','like',"%$keyword%")
                ->orWhere('middle_name','like',"%$keyword%")
                ->orderBy('last_name')
                ->orderBy('first_name')
                ->orderBy('middle_name')
                ->paginate();
        } else {
            $registrations = Registration::orderBy('last_name')
                ->orderBy('first_name')
                ->orderBy('middle_name')
                ->paginate();
        }


        return view("{$this->route}.search_{$this->route}",compact([
            'registrations'
        ]));
    }

    public function create(){

        return view('registrations.registrations',compact([
        ]));
    }

    public function store(Request $request){

        $this->validate($request,$this->arr_rules);
        $Registration = Registration::create($request->all());


        return Redirect::to("/{$this->route}/create")->with('flash_message','Information Saved');
        //return Redirect::to("/{$this->route}/{$Registration->id}/edit")->with('flash_message','Information Saved');
    }

    public function edit(Registration $registration){
        return view("{$this->route}.{$this->route}", compact([
            'registration'
        ]));

    }

    public function update(Request $request, Registration $registration){

        $this->validate($request,$this->arr_rules);
        $registration->update($request->all());

        return Redirect::to("/{$this->route}/{$registration->id}/edit")->with('flash_message','Information Saved');
    }

}
