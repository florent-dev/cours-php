<?php

namespace Model\Repository;

interface DAO {
    public function getAll();
    public function getById();
    public function insert();
    public function update();
    public function delete();
}