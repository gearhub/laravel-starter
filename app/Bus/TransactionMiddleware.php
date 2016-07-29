<?php

namespace App\Bus;

use DB;
use League\Tactician\Middleware;

class TransactionMiddleware implements Middleware
{
    /**
     * Wrap command bus in a database transaction.
     *
     * @param  mixed    $command
     * @param  callable $next
     *
     * @return mixed
     */
    public function execute($command, callable $next)
    {
      return DB::transaction(function() use($command, $next) {
        return $next($command);
      });
    }
}

