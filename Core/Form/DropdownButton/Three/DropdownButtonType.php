<?php
/*
 * This file is part of the BusinessDropCapBundle and it is distributed
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

namespace RedKiteLabs\RedKiteCms\TwitterBootstrapBundle\Core\Form\DropdownButton\Three;

use Symfony\Component\Form\FormBuilderInterface;

/**
 * Defines the form to edit the Bootstrap button's attributes
 *
 * @author RedKite Labs <info@redkite-labs.com>
 */
class DropdownButtonType extends \RedKiteLabs\RedKiteCms\TwitterBootstrapBundle\Core\Form\DropdownButton\Two\DropdownButtonType
{
    /**
     * Builds the form
     *
     * @see FormTypeExtensionInterface::buildForm()
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('button_text', null, array('label' => 'button_block_text',));
        $builder->add('button_type', 'choice', array('label' => 'button_block_type', 'choices' => array('btn-default' => 'base', 'btn-primary' => 'primary', 'btn-info' => 'info', 'btn-success' => 'success', 'btn-warning' => 'warning', 'btn-danger' => 'danger', 'btn-inverse' => 'inverse')));
        $builder->add('button_attribute', 'choice', array('label' => 'button_block_attribute', 'choices' => array("" => "normal", "btn-xs" => "mini", "btn-sm" => "small", "btn-lg" => "large")));
        $builder->add('button_block', 'choice', array('label' => 'button_block_attribute_block', 'choices' => array("" => "normal", "btn-block" => "block")));
        $builder->add('button_enabled', 'choice', array('label' => 'button_block_enabled', 'choices' => array("" => "enabled", "disabled" => "disabled")));
        $builder->add('button_href', "text", array('label' => 'button_block_href',));
        $builder->add('class', 'text', array('label' => 'common_label_class'));
    }
}
