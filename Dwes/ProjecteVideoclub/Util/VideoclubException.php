<?php

namespace Dwes\ProjecteVideoclub\Util;
use Exception;

class VideoclubException extends Exception {
    public function __construct($msj) {
        parent::__construct($msj);
    }
}