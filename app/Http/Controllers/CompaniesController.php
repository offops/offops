<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Commands\RegisterNewCompany;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $paginator = \App\Company::paginate();
        $companies = $paginator->getCollection();
        return view('companies.index', compact('companies', 'paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(\App\Http\Requests\RegisterCompanyFormRequest $request)
    {
        $workspace_id = $request->input('workspace_id');
        $company = $request->input('company');
        $user = $request->input('user');

        $result = $this->dispatch(new RegisterNewCompany(
            $workspace_id,
            $company['name'],
            $user
        ));

        return $request->ajax() ?
            response()->json($result, 201) :
            redirect('companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $company = \App\Company::findOrFail($id);

        return $request->ajax() ?
            response()->json($result, 200) :
            view('companies/show', [$company->id])->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
