<?php

namespace TroisLDecoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UploadType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('uploadName')
            //->add('updatedAt')
            ->add('uploadFile', VichImageType::class,
                ['required' => false,
                //'label' => 'Fichier Upload',
                'allow_delete' => false,
                //'download_uri' => true,
                //'download_label' => 'aperçu',
                ])
                ->add('envoyer', SubmitType::class
                )
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TroisLDecoBundle\Entity\Upload'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'troisldecobundle_upload';
    }


}
