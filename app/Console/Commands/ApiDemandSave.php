<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ApiDemandSave extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demandeur:apisave';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mise a jour avec la table demandeur sur le serveur de production';

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
        return 0;
    }
}
