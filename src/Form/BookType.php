<?php

namespace App\Form;

use App\Entity\Author;
use App\Entity\Book;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('category',ChoiceType::class,[
                'choices'=>['Category 1'=>'category1','Category 2'=>'category2'],
                'multiple'=>false,
                'expanded'=>false
            ])
            ->add('datePublication')
            ->add('idAuthor',EntityType::class,[
                'class'=>Author::class,
                'choice_label'=>'username',
                'multiple'=>false
            ])
            ->add('Submit',SubmitType::class)//input type submit
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}