<?php

declare(strict_types=1);

namespace OneCMS\Base\Infrastructure\Service\Uuid;

use OneCMS\Base\Domain\Service\Uuid\UuidServiceInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * UuidService class helps you to generate uuids for your objects.
 * This is depended on external library "ramsey/uuid".
 *
 * @package getonecms/base
 * @version 0.0.1
 * @since   0.0.1
 * @author  Mohammed Shifreen
 */
final class UuidService implements UuidServiceInterface
{
    /**
     * @var UuidInterface
     */
    private UuidInterface $uuid;

    /**
     * UuidService constructor.
     */
    public function __construct(?string $uuid = null)
    {
        if (!is_null($uuid)) {
            $this->validate($uuid);

            $this->uuid = $this->generateFromString($uuid);
        } else {
            $this->uuid = Uuid::uuid6();
        }
    }

    /**
     * Validates the uuid.
     *
     * @param string $uuid
     * @return void
     * @throws InvalidUuidException
     */
    private function validate(string $uuid): void
    {
        if (!Uuid::isValid($uuid)) {
            throw new InvalidUuidException('invalid_uuid', ['uuid' => $uuid]);
        }
    }

    /**
     * @inheritDoc
     */
    public function generateFromString(string $uuid): UuidInterface
    {
        return Uuid::fromString($uuid);
    }

    /**
     * @inheritDoc
     */
    public function provider(): UuidInterface
    {
        return $this->uuid;
    }

    /**
     * @inheritDoc
     */
    public function toString(): string
    {
        return $this->uuid->toString();
    }
}
