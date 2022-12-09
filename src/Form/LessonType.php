<?php

namespace App\Form;

use App\Entity\Lesson;
use App\Entity\School;
use App\Entity\Student;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LessonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('students',EntityType::class,[
                'class' => Student::class,
                'choice_label'=> 'lastName',
                'expanded' => false,
                'multiple' => true,
                'mapped' =>true,
                'attr'=> array('class'=>'select2'),
                'multiple' => true
            ])
            ->add('school',EntityType::class,[
                'class' => School::class,
                'choice_label'=> 'name',
                'multiple' => false
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lesson::class,
        ]);
    }
}
