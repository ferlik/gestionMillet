<?php

namespace App\Form;

use App\Entity\Commande;
use App\Form\CommandeArticleType;
use App\Form\CommandeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MergedFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('commande', CommandeType::class)
            ->add('commandeArticles', CommandeArticleType::class);
    }
}
