<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class PostAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content')
            ->add('title', 'text')
            ->add('content', 'sonata_simple_formatter_type', array(
                'format' => 'markdown',
                'ckeditor_context' => 'default', // optional
            ))
            ->add('thumbnail', 'text')

            ->end()

            ->with('Category list')
            ->add('category', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\Category',
                'property' => 'name',
            ))
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('content')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->addIdentifier('content')
            ->addIdentifier('thumbnail')
        ;
    }
}