<?php

namespace Kamran\ArticleBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ArticleType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'text', array(
            //'required' => false,
            'attr' =>array('class'=>'form-control','placeholder'=>'Status Text'),
        ));
        $builder->add('comments', 'textarea', array(
            'required' => false,
            'attr' =>array('class'=>'form-control','placeholder'=>'Description'),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kamran\ArticleBundle\Entity\Articles',
        ));
    }

    public function getName()
    {
        return 'articles_form';
    }
}