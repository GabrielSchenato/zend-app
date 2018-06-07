<?php

namespace CodeEmailMKT\Domain\Service;

use CodeEmailMKT\Domain\Entity\Campaign;

interface CampaignEmailServiceInterface extends EmailServiceInterface{

    public function setCampaign(Campaign $campaign);
}
