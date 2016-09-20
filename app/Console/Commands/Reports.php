<?php
namespace App\Console\Commands;

use DB;
use Mail;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class Reports extends Command {

    protected $signature = 'reports';

    protected $reports = [
        1 => [
            'function' => 'manager',
            'title' => 'Отчет по Главным менеджерам'
        ]
    ];

    public function handle() {

        foreach($this->reports as $report) {
            if ( method_exists($this, $report['function']) ){
                return $this->{$report['function']}($report);
            } else {
                echo "No method: {$report['function']}()\n";
            }
            //call_user_func($report['function'], $report);
        }

    }

    public function manager($report) {

    }

}