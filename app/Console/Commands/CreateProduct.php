<?php

namespace App\Console\Commands;

use App\Models\Product;
use Exception;
use Illuminate\Console\Command;

class CreateProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:create {name} {reference?} {price=0} {delivery_days=15}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert a new product into database';

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
        try {
            $product = new Product();
            $product->name = $this->argument("name");
            if($this->argument("reference") != null){
                $product->reference = $this->argument("reference");
            } else {
                $numbers = '0123456789';
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $partCharsRef = substr(str_shuffle($chars), 0, 3);
                $partNumbersRef = substr(str_shuffle($numbers), 0, 4);

                //TO-DO: It should be checked in the database before saving.
                $product->reference = "VX-".$partNumbersRef.$partCharsRef;
            }
            $product->price = $this->argument("price");
            $product->delivery_days = $this->argument("delivery_days");
            
            $product->save();
    
            $this->info("$product->name (Ref: $product->reference) created successfully!");
            
            if($product->price == 0)
                $this->warn("Alert: You didn't inform the product price, therefore it was set to 0.");

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
