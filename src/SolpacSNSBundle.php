<?php
namespace Solpac\SNSBundle;

use Solpac\SNSBundle\DependencyInjection\SolpacSNSExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SolpacSNSBundle extends Bundle
{
    /**
     * {@inheritDoc}
     * @version 0.0.1
     * @since 0.0.1
     */
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new SolpacSNSExtension();
        }

        return $this->extension;
    }
}
