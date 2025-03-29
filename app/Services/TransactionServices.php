<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

/*
 * TransactionServices class
 *
 * This class provides a method to run a callback within a database transaction.
 * If the transaction fails, it catches the exception and returns false.
 * If the transaction is successful, it returns true.
 */
class TransactionServices
{
    public function run(callable $callback): bool
    {
        try {
            DB::transaction(function () use ($callback) {
                $callback();
            });
            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }
}
