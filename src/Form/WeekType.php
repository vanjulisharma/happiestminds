<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WeekType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('week', ChoiceType::class,[
                'choices' => $this->generateWeekChoices(),
                'label' => 'Select a week',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
            $resolver->setDefaults([
                'data_class' => null,
            ]);
    }

    private function generateWeekChoices()
    {
        $choices =[];
        for($week=1;$week<=52;$week++){
            $choices[$week]=sprintf('Week %d',$week);
        }
        return $choices;
    }

}
