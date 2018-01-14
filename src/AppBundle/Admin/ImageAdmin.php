<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class ImageAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content')
            ->add('name', 'text')
            ->add('file', 'file')
            ->end()

            ->with('Post list')
            ->add('post', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\Post',
                'property' => 'title'
            ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('name');
    }

    public function prePersist($image)
    {
        $this->manageFileUpload($image);
    }

    public function preUpdate($image)
    {
        $this->manageFileUpload($image);
    }

    private function manageFileUpload($image)
    {
        if ($image->getName()) {
            $image->refreshUpdated();
        }
    }
}