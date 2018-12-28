<?php
namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $roles = $this->getParent('security.role_hierarchy.roles');
//        var_dump($roles);
        $builder
            ->add('email', EmailType::class)
            ->add('username', TextType::class)
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
            ))
            ->add('roles', ChoiceType::class, array(
                    'attr'  =>  array('class' => 'form-control',
                        'style' => 'margin:5px 0;'),
                    'choices' => array
                    (
                        'Student' => 'ROLE_USER',/*array
                            (
                                'Yes' => 'ROLE_USER',
                            ),*/
                        'Teacher' => 'ROLE_ADMIN', /*array
                            (
                                'Yes' => 'ROLE_ADMIN',
                            )*/
                    ),
                'multiple' => true,
                'required' => true,
            ))
//                        array
//                        (
//                            'ROLE_ADMIN' => array
//                            (
//                                'Yes' => 'ROLE_ADMIN',
//                            ),
//                            'ROLE_TEACHER' => array
//                            (
//                                'Yes' => 'ROLE_TEACHER'
//                            ),
//                            'ROLE_STUDENT' => array
//                            (
//                                'Yes' => 'ROLE_STUDENT'
//                            ),
//                            'ROLE_PARENT' => array
//                            (
//                                'Yes' => 'ROLE_PARENT'
//                            ),
//                        )
//                ,
//                    'multiple' => true,
//                    'required' => true,
//                )
//            )
//            ->add('roles', EntityType::class, array(
//                    'class'=> 'PaginasUsuariosBundle:Roles',
//                    'multiple' => true, // Allow multiple selection
//                    'choice_label'=>'nombre')
//            )
//            ->add('roles', RolesType::class, array(
//                'roles' => array(
//                    'Student' => 'ROLE_USER',
//                    'Teacher' => 'ROLE_ADMIN'
//                )
//            ))

//            ->add('Options to chose', ChoiceType::class, array(
//        '       choices' => array(
//                'm' => 'Male',
//                'f' => 'Female'
//                ),
//                'mapped'    => false,
//            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}
