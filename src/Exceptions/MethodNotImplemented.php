<?php

namespace KgBot\Shoporama\Exceptions;


class MethodNotImplemented extends \Exception
{

    protected $message = 'This method is not implemented on given resource.';
}