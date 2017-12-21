<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class CommentAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content')
            ->add('name', 'text')
            ->add('email', 'text')
            ->add('content', 'textarea')
            ->end()

            ->with('Post list')
            ->add('post', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\Post',
                'property' => 'title'
            ))
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('email')
            ->add('content')
         ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->addIdentifier('email')
            ->addIdentifier('content')
            ;
    }
}