<?php
/**
 * Created by PhpStorm.
 * Author: Damian Barczyk
 * Date: 20/01/2019
 * Time: 21:58
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * User Form
 */
class PlayerType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            //->add('score', NumberType::class)

        ;
    }
}
