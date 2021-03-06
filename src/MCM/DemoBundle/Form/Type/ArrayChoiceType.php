<?php
/**
 * Created by PhpStorm.
 * User: kodiers
 * Date: 17/02/16
 * Time: 03:40
 */
namespace MCM\DemoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArrayChoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('favColour', 'choice', array(
            'choices' => array(
                0 => 'red',
                1 => 'blue',
                2 => 'green',
                3 => 'white',
                4 => 'black',
            ),
        ))->add('save', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MCM\DemoBundle\Entity\Colour',
        ));
    }

    public function getName()
    {
        return 'array_choice';
    }
}