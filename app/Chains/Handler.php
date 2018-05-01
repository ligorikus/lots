<?php

namespace App\Chains;

interface Handler
{
    /**
     * @param Handler $handler
     * @return void
     */
    public function setNext(Handler $handler);

    /**
     * @param $request
     * @return mixed
     */
    public function next($request);
}