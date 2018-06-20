<?php

namespace App\Chains;

abstract class BaseHandler implements Handler
{
    /**
     * @var $request
     */
    protected $request;

    /**
     * @var Handler
     */
    protected $handler;

    /**
     * @var string
     */
    protected $message;

    /**
     * @param Handler $handler
     * @return void
     */
    public function setNext(Handler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function next($request)
    {
        $this->request = $request;
        if ($this->handle() && $this->handler) {
            return $this->handler->next($request);
        } else {
            return $this->message;
        }
    }

    abstract function handle();
}