<?php

namespace App\Console\Commands;

use App\Models\Rencontre;
use Illuminate\Console\Command;

class SetRencontreStatusCE extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ce:statusrencontre {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command met a jour une rencontre avec le CE absent';

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

        $this->output->progressStart($rencontres->count());

        foreach ($rencontres as $renc) {
            if (!$renc->dateprochainrdv->isFuture()){
                $renc->presencedemandeur = 'CE-ABSENT';
                $renc->rdvmanque = $renc->rdvmanque + 1;
                $renc->save();
            }
            $this->output->progressAdvance();
        }

        if ($rencontres->isNotEmpty()) {
            $this->output->progressFinish();
        }
    }
}
