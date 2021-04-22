<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Notifications\NewProductRegistered;
use Illuminate\Console\Command;

class TestProductRegisteredNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:slack';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test slack notifications for new users registered.';

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
        Product::first()->notify(new NewProductRegistered());
    }
}
