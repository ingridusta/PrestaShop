<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://devdocs.prestashop.com/ for more information.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

declare(strict_types=1);

namespace PrestaShop\PrestaShop\Core\Domain\AttributeGroup\Command;

use PrestaShop\PrestaShop\Core\Domain\AttributeGroup\Exception\AttributeGroupConstraintException;

/**
 * Adds new attribute group
 */
class AddAttributeGroupCommand
{
    /**
     * @var string[]
     */
    private $localizedNames;

    /**
     * @var int[]
     */
    private $shopAssociation;

    /**
     * @var array
     */
    private $localizedPublicNames;

    /**
     * @var string
     */
    private $type;

    /**
     * @param string[] $localizedNames
     * @param int[] $shopAssociation
     *
     * @throws AttributeGroupConstraintException
     */
    public function __construct(array $localizedNames, array $localizedPublicNames, string $type, array $shopAssociation = [])
    {
        $this->assertNamesAreValid($localizedNames);
        $this->assertNamesAreValid($localizedPublicNames);

        $this->localizedNames = $localizedNames;
        $this->localizedPublicNames = $localizedPublicNames;
        $this->type = $type;
        $this->shopAssociation = $shopAssociation;
    }

    /**
     * @return string[]
     */
    public function getLocalizedNames(): array
    {
        return $this->localizedNames;
    }

    /**
     * @return string[]
     */
    public function getLocalizedPublicNames(): array
    {
        return $this->localizedPublicNames;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int[]
     */
    public function getShopAssociation(): array
    {
        return $this->shopAssociation;
    }

    /**
     * Asserts that attribute group's names are valid.
     *
     * @param string[] $names
     *
     * @throws AttributeGroupConstraintException
     */
    private function assertNamesAreValid(array $names): void
    {
        if (empty($names)) {
            throw new AttributeGroupConstraintException('Attribute name cannot be empty', AttributeGroupConstraintException::EMPTY_NAME);
        }
    }
}
