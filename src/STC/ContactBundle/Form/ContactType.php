<?php

namespace STC\ContactBundle\Form;

use STC\ContactBundle\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;

/**
 * Class ContactType
 * @package STC\ContactBundle\Form
 */
class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $constraints = array(
            'civility' => array(
                new NotBlank(array('message' => 'Oups, vous n’avez pas choisi votre « Civilité ».'))
            ),
            'firstName' => array(
                new NotBlank(array('message' => 'Oups, vous n’avez pas saisi votre « Nom ».')),
                new Length(array('min' => 3, 'max' => 48))
            ),
            'lastName' => array(
                new NotBlank(array('message' => 'Oups, vous n’avez pas saisi votre « Prénom ».')),
                new Length(array('min' => 3, 'max' => 48))
            ),
            'zipCode' => array(
                new NotBlank(array('message' => 'Oups, vous n’avez pas saisi votre « Code Postal ».')),
                new Length(array('min' => 2, 'max' => 5))
            ),
            'email' => array(
                new NotBlank(array('message' => 'Oups, vous n’avez pas saisi votre « Email ».')),
                new Email(),
                new Length(array('max' => 64))
            ),
            'phone' => array(
                new NotBlank(array('message' => 'Oups, vous n’avez pas saisi votre « Téléphone ».')),
                new Length(array('max' => 10)),
                new Regex(
                    array(
                        'pattern' => '/([0-9\s\-]{7,})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/',
                        'message' => 'Le numéro de téléphone entré n\'est pas valide'
                    )
                )
            ),
            'address' => array(),
            'message' => array(new Length(array('max' => 1024))),
        );

        $builder
            ->add(
                'civility',
                'choice',
                array(
                    'label' => 'form.contact.civility',
                    'empty_value' => 'form.contact.civility_empty_value',
                    'required' => true,
                    'translation_domain' => 'ContactBundle',
                    'choices' => Contact::$civilityList,
                    'constraints' => $constraints['civility']
                )
            )
            ->add(
                'firstName',
                null,
                array(
                    'label' => 'form.contact.firstName',
                    'required' => true,
                    'attr' => array(
                        'placeholder' => 'form.contact.placeholder.firstName',
                        'maxlength' => '48',
                    ),
                    'translation_domain' => 'ContactBundle',
                    'constraints' => $constraints['firstName']
                )
            )
            ->add(
                'lastName',
                null,
                array(
                    'label' => 'form.contact.lastName',
                    'required' => true,
                    'attr' => array(
                        'placeholder' => 'form.contact.placeholder.lastName',
                        'maxlength' => '48',
                    ),
                    'translation_domain' => 'ContactBundle',
                    'constraints' => $constraints['lastName']
                )
            )
            ->add(
                'email',
                'email',
                array(
                    'label' => 'form.contact.email',
                    'required' => true,
                    'attr' => array(
                        'placeholder' => 'form.contact.placeholder.email',
                        'maxlength' => '64',
                    ),
                    'translation_domain' => 'ContactBundle',
                    'constraints' => $constraints['email']
                )
            )
            ->add(
                'phone',
                'text',
                array(
                    'label' => 'form.contact.phone',
                    'required' => true,
                    'attr' => array(
                        'placeholder' => 'form.contact.placeholder.phone',
                        'maxlength' => '10',
                    ),
                    'translation_domain' => 'ContactBundle',
                    'constraints' => $constraints['phone']
                )
            )
            ->add(
                'address',
                null,
                array(
                    'label' => 'form.contact.address',
                    'required' => false,
                    'attr' => array(
                        'placeholder' => 'form.contact.placeholder.address',
                        'maxlength' => '64',
                    ),
                    'translation_domain' => 'ContactBundle',
                    'constraints' => $constraints['address']
                )
            )
            ->add(
                'zipCode',
                'text',
                array(
                    'label' => 'form.contact.zipCode',
                    'required' => true,
                    'attr' => array(
                        'placeholder' => 'form.contact.placeholder.zipCode',
                        'maxlength' => '5',
                    ),
                    'translation_domain' => 'ContactBundle',
                    'constraints' => $constraints['zipCode']
                )
            )
            ->add(
                'message',
                null,
                array(
                    'label' => 'form.contact.message',
                    'required' => false,
                    'attr' => array(
                        'placeholder' => 'form.contact.placeholder.message',
                        'maxlength' => '1024'
                    ),
                    'translation_domain' => 'ContactBundle',
                    'constraints' => $constraints['message']
                )
            );

        $builder->addEventListener(
            FormEvents::PRE_SUBMIT,
            function (FormEvent $event) {
                // respond to the event, modify data, or form elements

                $data = $event->getData();
                $form = $event->getForm();

                if (empty($data['civility']) && empty($data['firstName']) && empty($data['lastName']) && empty($data['email']) && empty($data['zipCode']) && empty($data['phone']) && empty($data['address'])) {
                    $form->addError(
                        new FormError("Oups, vous n’avez pas saisi l’ensemble des champs obligatoire.")
                    );
                }

                $event->setData($data);
            }
        );
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'STC\ContactBundle\Entity\Contact'
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'form_contact';
    }
}