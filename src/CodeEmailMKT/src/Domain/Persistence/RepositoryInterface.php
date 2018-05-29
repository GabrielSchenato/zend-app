<?php

namespace CodeEmailMKT\Domain\Persistence;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author gabriel
 */
interface RepositoryInterface 
{

    public function create($entity);

    public function update($entity);

    public function remove($entity);

    public function find($id);

    public function findAll();
}
