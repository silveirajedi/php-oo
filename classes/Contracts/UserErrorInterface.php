<?php

namespace Classes\Contracts;

interface UserErrorInterface
{

    public function setError($error);

    public function getError();

}