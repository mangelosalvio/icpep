<?php

namespace App\Http\Controllers;

use App\Company;
use App\Education;
use App\Membership;
use App\Registration;
use App\TypeOfMembership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class MembershipsController extends Controller
{
    public function __construct(){

        $this->middleware('auth')
        ->except([
            'education',
            'destroyEducation',
            'companies',
            'destroyCompany',
            'create',
            'store'
        ]);

        $route = "memberships";
        $this->route = $route;

        $renewal_applications = TypeOfMembership::whereTypeOfApplication('R')->get();
        $new_applications = TypeOfMembership::whereTypeOfApplication('N')->get();
        $type_of_education = [
          'T' => 'Tertiary',
          'M' => 'Masters',
          'D' => 'Doctoral'
        ];

        $this->arr_rules  = [
            'last_name' => 'required',
            'first_name' => 'required',
            'type_of_application' => 'required',
            'type_of_membership' => 'required',
            'type_of_member' => 'required',
            'gender' => 'required',
            'place_of_birth' => 'required',
        ];

        $search_data = [ 'search_url' => $this->route ];

        return view()->share(compact(['search_data','route','renewal_applications','new_applications','type_of_education']));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request){
        $keyword = $request->input('keyword');

        if ( $keyword ) {
            $memberships = Membership::where('last_name','like',"%$keyword%")
                ->orWhere('first_name','like',"%$keyword%")
                ->orWhere('middle_name','like',"%$keyword%")
                ->latest()
                ->paginate();
        } else {
            $memberships = Membership::latest()->paginate();
        }

        return view("{$this->route}.search_{$this->route}",compact([
            'memberships'
        ]));
    }

    public function create(){
        return view('memberships.memberships',compact([
        ]));
    }

    public function store(Request $request){

        //dd(request()->has('educations'));

        $this->arr_rules['email'] = ['required' , Rule::unique('memberships')];

        $this->validate($request,$this->arr_rules);
        $Membership = Membership::create($request->all());

        $this->saveEducation($Membership, $request);
        $this->saveCompanies($Membership, $request);

        if ( $request->has('action') ) {
            $Membership->is_approved = $request->input('action') == "approve" ? 1 : 0;
            $Membership->save();
        }

        if ( Auth::check() ) {
            return Redirect::to("/{$this->route}/{$Membership->id}/edit")->with('flash_message','Information Saved.');
        } else {
            return Redirect::to("/new-membership")->with('flash_message','Information Saved. Admin will validate your membership');
        }

    }

    public function edit(Membership $membership){
        return view("{$this->route}.{$this->route}", compact([
            'membership'
        ]));
    }

    public function update(Request $request, Membership $membership){

        $this->arr_rules['email'] = ['required' , Rule::unique('memberships')->ignore($membership->id)];

        $this->validate($request,$this->arr_rules);
        $membership->update($request->all());

        if ( $request->has('action') ) {
            $membership->is_approved = $request->input('action') == "approve" ? 1 : 0;
            $membership->save();
        }

        $this->saveEducation($membership, $request);
        $this->saveCompanies($membership, $request);


        return Redirect::to("/{$this->route}/{$membership->id}/edit")->with('flash_message','Information Saved');
    }

    private function saveEducation(Membership $Membership, Request $request){
        if ( $request->has('educations') ) {
            foreach ( $request->input('educations')['id']  as $i => $id) {
                if ( empty($id) ) {
                    $Membership->educations()->create([
                        'degree' => $request->input('educations')['degree'][$i],
                        'type_of_education' => $request->input('educations')['type_of_education'][$i],
                        'inclusive_date' => $request->input('educations')['inclusive_date'][$i]
                    ]);
                } else {
                    Education::find($id)->update([
                        'degree' => $request->input('educations')['degree'][$i],
                        'type_of_education' => $request->input('educations')['type_of_education'][$i],
                        'inclusive_date' => $request->input('educations')['inclusive_date'][$i]
                    ]);
                }
            }
        }

    }

    private function saveCompanies(Membership $Membership, Request $request){
        if ( $request->has('companies') ) {
            foreach ( $request->input('companies')['id']  as $i => $id) {
                if ( empty($id) ) {
                    $Membership->companies()->create([
                        'company' => $request->input('companies')['company'][$i],
                        'position' => $request->input('companies')['position'][$i],
                        'inclusive_date' => $request->input('companies')['inclusive_date'][$i]
                    ]);
                } else {
                    Company::find($id)->update([
                        'company' => $request->input('companies')['company'][$i],
                        'position' => $request->input('companies')['position'][$i],
                        'inclusive_date' => $request->input('companies')['inclusive_date'][$i]
                    ]);
                }
            }
        }

    }

    public function education( Membership $membership ){
        return $membership->educations;
    }

    public function destroyEducation(Education $education){
        $education->delete();
    }

    public function companies( Membership $membership ){
        return $membership->companies;
    }

    public function destroyCompany(Company $company){
        $company->delete();
    }
}
