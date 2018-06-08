<?php

declare (strict_types = 1);

namespace CodeEmailMKT\Domain\Persistence\Criteria;

use CodeEmailMKT\Domain\Persistence\CriteriaInterface;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author gabriel
 */
interface FindByIdCriteriaInterface extends CriteriaInterface {

    public function setId(int $id);

    public function getId(): int;
}
