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

namespace RedKiteCms\Block\TwitterBootstrapBundle\Tests\Unit\Core\Block\Label;

use RedKiteLabs\RedKiteCmsBundle\Tests\Unit\Core\Content\Block\Base\AlBlockManagerContainerBase;

/**
 * AlBlockManagerTestBase
 *
 * @author RedKite Labs <info@redkite-labs.com>
 */
abstract class AlBlockManagerLabelTestBase extends AlBlockManagerContainerBase
{    
    protected abstract function getBlockManager();
    
    protected function defaultValue($expectedValue)
    {
        $this->initContainer(); 
        $blockManager = $this->getBlockManager();
        $this->assertEquals($expectedValue, $blockManager->getDefaultValue());
    }
    
    protected function editorParameters($value, $formServiceName, $type, $formName)
    {
        $block = $this->initBlock($value);
        $this->initContainer();
        
        $form = $this->getMockBuilder('Symfony\Component\Form\Form')
                    ->disableOriginalConstructor()
                    ->getMock();
        $form->expects($this->once())
            ->method('createView')
            ->will($this->returnValue('the-form'))
        ;

        $formFactory = $this->getMockBuilder('RedKiteCms\Block\TwitterBootstrapBundle\Core\Form\Factory\BootstrapFormFactory')
                    ->disableOriginalConstructor()
                    ->getMock();
        $formFactory->expects($this->once())
                    ->method('createForm')
                    ->with($type, $formName)
                    ->will($this->returnValue($form))
        ;
        $this->container->expects($this->at(2))
                        ->method('get')
                        ->with('twitter_bootstrap.bootstrap_form_factory')
                        ->will($this->returnValue($formFactory))
        ;
        
        $blockManager = $this->getBlockManager();
        $blockManager->set($block);
        $blockManager->editorParameters();
    }
    
    protected function getHtml($value, $contentView, $expectedData)
    {
        $block = $this->initBlock($value);
        $this->initContainer();
        
        $blockManager = $this->getBlockManager();
        $blockManager->set($block);
        
        $expectedResult = array('RenderView' => array(
            'view' => $contentView,
            'options' => array(
                'data' => $expectedData,
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
    
    protected function initForm()
    {
        $form = $this->getMockBuilder('Symfony\Component\Form\Form')
                    ->disableOriginalConstructor()
                    ->getMock();
        $form->expects($this->once())
            ->method('createView')
        ;
        
        return $form;
    }
}
