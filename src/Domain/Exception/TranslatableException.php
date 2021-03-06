<?php

declare(strict_types=1);

namespace OneCMS\Base\Domain\Exception;

use Exception;
use OneCMS\Base\Domain\Service\Exception\TranslatableExceptionServiceInterface;

/**
 * TranslatableException
 *
 * @package getonecms/ext-base
 * @version 0.0.1
 * @since   0.0.1
 * @author  Mohammed Shifreen
 */
class TranslatableException extends Exception implements TranslatableExceptionServiceInterface
{
    /**
     * The class constructor.
     *
     * @param string $messageKey
     * @param string[] $params additional items that should be incluided in the message can be passed as `name => value`.
     */
    public function __construct(
        private readonly string $messageKey,
        private readonly array $params = []
    ) {
        parent::__construct();
    }

    /**
     * @inheritDoc
     */
    public function getMessageKey(): string
    {
        return $this->messageKey;
    }

    /**
     * @inheritDoc
     */
    public function getParam(string $key): ?string
    {
        return $this->params[$key] ?? null;
    }
}
