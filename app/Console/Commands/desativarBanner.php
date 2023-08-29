<?php

namespace App\Console\Commands;

use App\Banner;
use Carbon\Carbon;
use Illuminate\Console\Command;

class desativarBanner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'banner:desativar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Desativa banners com base na data_fim';

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
        $now = Carbon::now()->format('Y-m-d');

        $banners = Banner::where('data_fim', '<', $now)
                        ->where('status', 1)
                        ->get();

        foreach ($banners as $banner) {
            $banner->update([
                'status' => 0
            ]);
            $this->info("Banner Desativado: ID {$banner->id} , inicio: {$banner->data_inicio} Fim: {$banner->data_fim}.");
        }
        if ($banners->count() > 0) {
            $this->info("Total de banners Desativados: {$banners->count()}");
        } else {
            $this->info("Nenhum banner precisava ser inativado.");
        }
    }
}
