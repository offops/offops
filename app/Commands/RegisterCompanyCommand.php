<?php

namespace App\Commands;

use App\Commands\Command;
use App\Company;
use App\Http\Requests\RegisterCompanyFormRequest;
use App\User;
use App\Workspace;
use Illuminate\Contracts\Bus\SelfHandling;


class RegisterCompanyCommand extends Command implements SelfHandling
{
    /**
     * Register a new company with a primary user
     * @var App\User
     */
    private $user;

    /**
     * Create a new command instance.
     *
     * @param \App\User primary user
     * @return void
     */
    public function __construct(RegisterCompanyFormRequest $request)
    {
        $this->workspace_id = $request->input('company_workspace_id');

        $this->company = [
            'name' => $request->input('company_name'),
            'workspace_id' => $request->input('company_workspace_id'),
        ];

        $this->user = [
            'name' => $request->input('user_name'),
            'email' => $request->input('user_email'),
        ];
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        \Log::info([
            'company' => $this->company,
            'user' => $this->user
        ]);

        // db transaction
        \DB::transaction(function() use (&$company)
        {
            // fetch workspace
            $workspace = Workspace::findOrFail($this->workspace_id);

            // assoc existing user to this company
            $user_email = $this->user['email'];
            $user = User::findByEmail($user_email) ?: new User;
            $user->fill($this->user);
            $user->password = str_random(16);

            // if the user/company exists, 
            // update the values instead of creating a new one
            $company = $user->company ?: new Company;
            $company->fill($this->company);

            // set fks
            $company->workspace_id = $this->workspace_id;

            // save company to workspace
            if ( ! $workspace->companies()->saveMany([$company]) )
            {
                throw new Exception('Could not save company');
            }

            // save user to company
            if ( ! $company->users()->saveMany([$user]) )
            {
                throw new Exception('Could not save user');
            }

            return $company;
        });

        return null;
    }
}
