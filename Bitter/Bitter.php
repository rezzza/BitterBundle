<?php

namespace Rezzza\BitterBundle\Bitter;

use FreeAgent\Bitter\Bitter as BaseBitter;

/**
 * @author Jérémy Romey <jeremy@free-agent.fr>
 */
class Bitter extends BaseBitter
{
    public function __construct($redisClient, $prefixKey, $expireTimeout)
    {
        parent:: __construct($redisClient, $prefixKey . ':', $prefixKey . '_temp:', $expireTimeout);
    }
}
