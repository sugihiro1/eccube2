<?php

namespace Plugin\ZaifPayment\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class ZaifPaymentConfigType extends AbstractType
{
    protected $app;
    protected $data;

    public function __construct($app, $data = null)
    {
        $this->app = $app;
        $this->data = $data;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('apikey', 'text', array(
                'constraints' => array(
                    new Assert\NotBlank(),
                ),
                'data' => $this->data['apikey'],
            ))
            ->add('apisecret', 'text', array(
                'constraints' => array(
                    new Assert\NotBlank(),
                ),
                'data' => $this->data['apisecret'],
            ));
    }

    public function getName()
    {
        return 'zaif_payment_config';
    }
}
