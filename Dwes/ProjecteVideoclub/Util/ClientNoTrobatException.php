<?php

namespace Dwes\ProjecteVideoclub\Util;
use Exception;

class ClientNoTrobatException extends VideoclubException {
    public function __construct($msj) {
        parent::__construct($msj);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->codxxe}]: {$this->message}\n";
    }
}