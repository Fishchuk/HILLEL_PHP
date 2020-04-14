<?php

class Product {
    public function set(WorkProduct $name, WorkProduct $value) {}
    public function get(PrintProduct $product) {}
}
Class WorkProduct{
    public function save() {}
    public function update() {}
    public function delete() {}
    public function show() {}
}
Class PrintProduct{
    public function print(WorkProduct $product) {}
}