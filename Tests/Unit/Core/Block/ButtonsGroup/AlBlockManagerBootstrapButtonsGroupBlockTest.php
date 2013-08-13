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

namespace RedKiteCms\Block\TwitterBootstrapBundle\Tests\Unit\Core\Block\ButtonsGroup;

use RedKiteLabs\RedKiteCmsBundle\Tests\Unit\Core\Content\Block\Base\AlBlockManagerContainerBase;
use RedKiteCms\Block\TwitterBootstrapBundle\Core\Block\ButtonsGroup\AlBlockManagerBootstrapButtonsGroupBlock;


/**
 * AlBlockManagerBootstrapAccordionBlockTest
 *
 * @author RedKite Labs <info@redkite-labs.com>
 */
class AlBlockManagerBootstrapButtonsGroupBlockTest extends AlBlockManagerContainerBase
{  
    public function testDefaultValue()
    {
        $expectedValue = array(
            array(
                "type" => "BootstrapButtonBlock",
            ),
            array(
                "type" => "BootstrapButtonBlock",
            ),
            array(
                "type" => "BootstrapButtonBlock",
            ),
        );
            
        $this->initContainer(); 
        $blockManager = new AlBlockManagerBootstrapButtonsGroupBlock($this->container, $this->validator);
        $defaultValue = $blockManager->getDefaultValue();
        $this->assertEquals($expectedValue, json_decode($defaultValue["Content"], true));
    }
    
    public function testGetHtml()
    {
        $value = '
        {
            "0" : {
                "type": "BootstrapButtonBlock"
            },
            "1" : {
                "type": "BootstrapButtonBlock"
            },
            "2" : {
                "type": "BootstrapButtonBlock"
            }
        }';
            
        $block = $this->initBlock($value);
        $this->initContainer();
        
        $blockManager = new AlBlockManagerBootstrapButtonsGroupBlock($this->container, $this->validator);
        $blockManager->set($block);
        
        $expectedResult = array('RenderView' => array(
            'view' => 'TwitterBootstrapBundle:Content:ButtonsGroup/buttons_group.html.twig',
            'options' => array(
                'buttons' => array(
                    array(
                        "type" => "BootstrapButtonBlock",
                    ),
                    array(
                        "type" => "BootstrapButtonBlock",
                    ),
                    array(
                        "type" => "BootstrapButtonBlock",
                    ),
                ),
                'block_manager' => $blockManager,
            ),
        ));
        
        $this->assertEquals($expectedResult, $blockManager->getHtml());
    }
    
    protected function initBlock($value)
    {
        $block = $this->getMock('RedKiteLabs\RedKiteCmsBundle\Model\AlBlock');
        $block->expects($this->once())
              ->method('getContent')
              ->will($this->returnValue($value));

        return $block;
    }
}
