<?php

namespace Acme\Requests;

interface RequestInterface
{
    public function prepareRequest();
    public function saveRespons(Array $respons);
    public function getRequest(String $url, String $getField);
}