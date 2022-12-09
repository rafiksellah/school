<?php

namespace App\Form;

use App\Entity\Grade;
use App\Entity\Lesson;
use App\Entity\Student;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GradeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('student',EntityType::class,[
                'class' => Student::class,
                'choice_label'=> 'lastName',
                'multiple' => false
                ])
            ->add('lesson',EntityType::class,[
                'class' => Lesson::class,
                'choice_label'=> 'name',
                'multiple' => false
                ])
            ->add('score')   
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Grade::class,
        ]);
    }
}
