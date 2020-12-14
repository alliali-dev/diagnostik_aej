<?php

namespace App\Console\Commands;

use App\Mail\RencontreShipped;
use App\Mail\SuiviRencontreShipped;
use App\Models\Rencontre;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class RdvAlerteEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rdv:alerteemail {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command rdv alerte email';

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
     * @return int
     */
    public function handle()
    {
        $rencontres = Rencontre::whereStatus(false);

        if ($this->argument('id')) {
            $rencontres = $rencontres->where('id', $this->argument('id'));
        }

        $rencontres = $rencontres->get();

        if ($rencontres->isEmpty()) {
            $this->warn('Nothing to process...');
            return;
        }

        $data =[];

        $this->output->progressStart($rencontres->count());

        foreach ($rencontres as $renc) {
            $end_date = Carbon::parse($renc->dateprochainrdv);
            $checkalert = $end_date->diff(\Carbon\Carbon::now())->format('%d %h');

            $user = User::findOrFail($renc->user_id);

            $data[] = ['alert' => $checkalert];
            if ($renc->dateprochainrdv->isFuture()){
               if ($checkalert == '1'){
                   Mail::to($user->email)->send(new SuiviRencontreShipped($renc));
               }
            }
            $this->output->progressAdvance();
        }

        if ($rencontres->isNotEmpty()) {
            $this->output->progressFinish();
        }
    }
}
