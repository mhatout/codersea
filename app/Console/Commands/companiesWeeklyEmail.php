<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Company;
use App\Employee;

class companiesWeeklyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:week';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a weekly email to all Companies with new Employees';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $companies = Company::all();
        $date = Carbon::today()->subDays(7);
        foreach ($companies as $company) {
            $employees = Employee::where('created_at','>=',$date)->where('company', '=', $company->id)->get();
            $data['employees'] = $employees;    
            Mail::send('emails.companiesWeeklyMail', $data, function ($message) use ($company) {
                $message->from('example@laravel.com', 'Codersea Laravel Project');
                // $message->to($company->email)
                $message->to('muhamad.atout@gmail.com')
                    ->subject($company->name . ' New Employees');
            });
        }
    }
}
