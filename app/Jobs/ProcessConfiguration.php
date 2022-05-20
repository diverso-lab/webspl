<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\Configuration;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\Process\Process;

class ProcessConfiguration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $configuration;
    protected $username;
    protected $password;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($configuration, $username, $password)
    {
        $this->configuration = $configuration;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
            
        $configuration = $this->configuration;
        $username = $this->username;
        $password = $this->password;

        $process = new Process(['python3', app_path('Runner/builder.py'), $configuration->web_name, $configuration->admin_email, $configuration->theme, $configuration->php, $configuration->storage, $configuration->catalog, $configuration->search, $configuration->paypal_payment, $configuration->creditcard_payment,$configuration->mobile_payment, $configuration->cart, $configuration->security, $configuration->backup, $configuration->seo, $configuration->twitter_socials, $configuration->facebook_socials, $configuration->youtube_socials, $username, $configuration->assigned_port, $password]);
        $process->setTimeout(450);
        $process->setIdleTimeout(450);
        $process->run();

        $configuration->status = 'READY';
        $configuration->save();

        $sender = new Process(['python3.9', app_path('Runner/sender.py'), $configuration->admin_email, $configuration->web_name, $username, $password]);
        $sender->run();
    }
}
