<?php
/**
 * Created by PhpStorm.
 * User: kodiers
 * Date: 16/02/16
 * Time: 03:51
 */
namespace MCM\DemoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('task')
//            ->add('dueDate', null, array('widget' => 'single_text'))
//            ->add('save', SubmitType::class)
            ->add('name', 'text', array(
                'label' => 'Your name',
            ))
            ->add('age', 'integer')
            ->add('save', 'submit', array(
                'attr' => array(
//                    'formnovalidate' => 'formnovalidate',
                    'class' => 'mySubmitbutton'
                )
            ));
//            ->getForm();
    }
    public function getName()
    {
        return 'person';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MCM\DemoBundle\Entity\Person',
        ));
    }
}