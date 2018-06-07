<?php

namespace CodeEmailMKT\Application\Form;

use CodeEmailMKT\Domain\Entity\Tag;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Form\Element\ObjectSelect;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Zend\Form\Element\Button;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CampaignForm
 *
 * @author gabriel
 */
class CampaignForm extends Form implements ObjectManagerAwareInterface {

    private $objectManager;

    public function __construct($name = 'campaing', $options = array())
    {
        parent::__construct($name, $options);
    }

    public function init()
    {

        $this->add([
            'name' => 'id',
            'type' => Hidden::class
        ]);

        $this->add([
            'name' => 'name',
            'type' => Text::class,
            'options' => [
                'label' => 'Nome'
            ],
            'attributes' => [
                'id' => 'name'
            ]
        ]);

        $this->add([
            'name' => 'tags',
            'type' => ObjectSelect::class,
            'attributes' => [
                'multiple' => 'multiple'
            ],
            'options' => [
                'object_manager' => $this->getObjectManager(),
                'target_class' => Tag::class,
                'property' => 'name',
                'label' => 'Tags'
            ]
        ]);
        
        $this->add([
            'name' => 'template',
            'type' => Textarea::class,
            'options' => [
                'label' => 'Template'
            ],
            'attributes' => [
                'id' => 'template'
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => Button::class,
            'attributes' => [
                'type' => 'submit'
            ]
        ]);
    }

    public function getObjectManager(): ObjectManager
    {
        return $this->objectManager;
    }

    public function setObjectManager(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

}
