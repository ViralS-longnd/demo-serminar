<?php

namespace App\Exceptions;

use Exception;

class ProductNotFoundException extends Exception
{
    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('Product not found');
    }
}
