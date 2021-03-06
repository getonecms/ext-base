<?php

declare(strict_types=1);

namespace OneCMS\Base\Infrastructure\Service\Application;

use OneCMS\Base\Domain\Service\Application\ApplicationServiceInterface as DomainApplicationServiceInterface;

/**
 * ApplicationServiceInterface
 */
interface ApplicationServiceInterface extends DomainApplicationServiceInterface
{
    /**
     * Returns the service instance for the given name if registered in the container.
     *
     * @param string $name Alias or fully qualified class name that has registered with the container.
     * @param array $params Array of constructor parameters values.
     * @param array $config Array of name-value pairs that will be used to initialize the object properties.
     *
     * @return mixed
     */
    public function getService(string $name, array $params, array $config);

    /**
     * Shorcut and safe method to get the value of the application property.
     *
     * @param string $name
     * @return mixed
     */
    public function getApplicaitonProperty(string $name): mixed;

    /**
     * Shorcut and safe method to set the value of the application property.
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function setApplicaitonProperty(string $name, mixed $value): void;
}
