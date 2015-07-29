<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Company;
use App\User;
use App\Workspace;

class RegisterNewCompany extends Command implements SelfHandling
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
    public function __construct($workspace_id, $company_name, $user)
    {
        $this->user = $user + ['password' => str_random(16)];
        $this->workspace_id = $workspace_id;
        $this->company_name = $company_name;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $company = null;

        // db transaction
        \DB::transaction(function() use (&$company)
        {
            // fetch workspace
            $workspace = Workspace::findOrFail($this->workspace_id);

            // prep the user
            $user_email = $this->user['email'];
            $user = User::findByEmail($user_email) ?: new User;
            $user->fill($this->user);

            // prep the company
            $company = $user->company ?: new Company;
            $company->name = $this->company_name;

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

        });

        return $company;
    }
}
