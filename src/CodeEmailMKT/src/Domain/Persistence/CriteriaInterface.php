<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeEmailMKT\Domain\Persistence;

/**
 *
 * @author gabriel
 */
interface CriteriaInterface {
    public function apply(RepositoryCriteriaInterface $repository);
}
