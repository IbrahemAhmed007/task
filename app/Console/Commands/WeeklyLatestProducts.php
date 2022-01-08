<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\User;
use App\Notifications\LatestProductsNotification;
use Illuminate\Console\Command;

class WeeklyLatestProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'latest-products:weekly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Respectively send the latest 10 products to everyone weekly via email.';

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
        foreach (User::get() as $user) {
            $user->notify(new LatestProductsNotification());
        }
        $this->info('Successfully sent weekly latest products to everyone.');
    }
}
