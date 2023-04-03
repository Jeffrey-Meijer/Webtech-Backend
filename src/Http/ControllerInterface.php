<?php

namespace Webtech\Http;

interface ControllerInterface {
    public function getModel();
    public function setModel(Model $model);
}
