<?php

/**
 * PHP Service Bus Saga (Process Manager) implementation
 *
 * @author  Maksim Masiukevich <dev@async-php.com>
 * @license MIT
 * @license https://opensource.org/licenses/MIT
 */

declare(strict_types = 1);

namespace ServiceBus\Sagas;

/**
 * Basic information about saga
 *
 * @property-read string $sagaClass
 * @property-read string $identifierClass
 * @property-read string $containingIdentifierProperty
 * @property-read string $expireDateModifier
 */
final class SagaMetadata
{
    public const DEFAULT_EXPIRE_INTERVAL = '+1 hour';

    /**
     * Class namespace
     *
     * @var string
     */
    public $sagaClass;

    /**
     * Identifier class
     *
     * @var string
     */
    public $identifierClass;

    /**
     * The field that contains the saga identifier
     *
     * @var string
     */
    public $containingIdentifierProperty;

    /**
     * Saga expire date modifier
     *
     * @see http://php.net/manual/ru/datetime.formats.relative.php
     *
     * @var string
     */
    public $expireDateModifier;

    /**
     * @param string $sagaClass
     * @param string $identifierClass
     * @param string $containingIdentifierProperty
     * @param string $expireDateModifier
     *
     * @return self
     */
    public static function create(
        string $sagaClass,
        string $identifierClass,
        string $containingIdentifierProperty,
        string $expireDateModifier
    ): self
    {
        return new self($sagaClass, $identifierClass, $containingIdentifierProperty, $expireDateModifier);
    }

    /**
     * @param string $sagaClass
     * @param string $identifierClass
     * @param string $containingIdentifierProperty
     * @param string $expireDateModifier
     */
    private function __construct(
        string $sagaClass,
        string $identifierClass,
        string $containingIdentifierProperty,
        string $expireDateModifier
    )
    {
        $this->sagaClass                    = $sagaClass;
        $this->identifierClass              = $identifierClass;
        $this->containingIdentifierProperty = $containingIdentifierProperty;
        $this->expireDateModifier           = $expireDateModifier;
    }
}