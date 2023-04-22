<?php

namespace App\Listeners;

use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class QueryExecutedListener
{
    public function handle(QueryExecuted $event)
    {
//        Log::info('SQL query executed: ' . $event->sql . '| params: ' . print_r($event->bindings, 1));
    }
}
