<?php
namespace Webtech\Http;

interface ModelInterface { // Start of an ORM
    public function create();
    public function get();
    public function update();
    public function delete();
}
