<?php 

namespace Millionaire;

interface Saveable {
    public function getData();
    public function getTable();
    public function getColumns();
}