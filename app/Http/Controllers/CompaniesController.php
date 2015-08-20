<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use App\Http\Requests;
use \App\Commands\RegisterCompanyCommand;
use \App\Http\Requests\RegisterCompanyFormRequest;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $paginator = Company::paginate();
        $companies = $paginator->getCollection();

        return $request->ajax() ?
            response()->json($companies, 200) : // ajax
            view('companies.index', compact('paginator','companies')); // html 
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
     * @param  RegisterCompanyFormRequest  $request
     * @return Response
     */
    public function store(RegisterCompanyFormRequest $request)
    {
        $result = $this->dispatch(new RegisterCompanyCommand($request));

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
        $company = Company::findOrFail($id);

        return view('companies/show', [$company->id])->with('company', $company);
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
