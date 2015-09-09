<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * License Entity.
 */
class License extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'consumerAmount' => true,
        'consumerType' => true,
        'issuer' => true,
        'subject' => true,
        'holder' => true,
        'notAfter' => true,
        'info' => true,
        'companyName' => true,
        'contactName' => true,
        'contactEmail' => true,
        'user_id' => true,
        'jsonLicense' => true,
        'binLicense' => true,
        'user' => true,
    ];
}
