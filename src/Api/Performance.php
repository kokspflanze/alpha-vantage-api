<?php

declare(strict_types=1);

namespace AlphaVantage\Api;

class Performance extends AbstractApi
{
    /**
     * @return array
     */
    public function section()
    {
        return $this->get('SECTOR');
    }
}
