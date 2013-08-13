<?php
/*
 * This file is part of the TwitterBootstrapBundle and it is distributed
 * under the MIT LICENSE. To use this application you must leave intact this copyright 
 * notice.
 *
 * Copyright (c) RedKite Labs <info@redkite-labs.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://www.redkite-labs.com
 * 
 * @license    MIT LICENSE
 * 
 */

namespace RedKiteCms\Block\TwitterBootstrapBundle\Tests\Unit\Core\Form\Button;

use RedKiteLabs\RedKiteCmsBundle\Tests\Unit\Core\Form\Base\AlBaseType;
use RedKiteCms\Block\TwitterBootstrapBundle\Core\Form\Button\AlButtonType;

/**
 * AlThumbnailTypeTest
 *
 * @author RedKite Labs <info@redkite-labs.com>
 */
class AlButtonTypeTest extends AlBaseType
{
    protected function configureFields()
    {
        return array(
            'button_text',
            'button_type',
            'button_attribute',
            'button_block',
            'button_enabled',
        );
    }
    
    protected function getForm()
    {
        return new AlButtonType();
    }
    
    public function testDefaultOptions()
    {
        $this->assertEquals(array('csrf_protection' =>false), $this->getForm()->getDefaultOptions(array()));
    }
    
    public function testGetName()
    {
        $this->assertEquals('al_json_block', $this->getForm()->getName());
    }
}
