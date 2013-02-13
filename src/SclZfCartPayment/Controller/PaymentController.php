<?php

namespace SclZfCartPayment\Controller;

use SclAdmin\Controller\AbstractActionController;
use Zend\Form\Form;

/**
 * Displays a page letting the use decide which payment option they want to use.
 *
 * @author Tom Oram <tom@scl.co.uk>
 */
class PaymentController extends AbstractActionController
{
    /**
     * Displays a selector for choosing how to pay.
     *
     * @return array
     */
    public function selectPaymentAction()
    {
        /* @var $fetcher \SclZfCartPayment\Fetcher\MethodFetcherInterface */
        $fetcher = $this->getServiceLocator()->get('SclZfCartPayment\MethodFetcher');

        /* @var $form \SclZfCartPayment\Form\PaymentMethods */
        $form = $this->getServiceLocator()->get('SclZfCartPayment\Form\PaymentMethods');

        $form->setAttribute('action', $this->url()->fromRoute('payment/select-payment'));

        $form->addMethods($fetcher->listMethods());

        if ($this->formSubmitted($form)) {
            $fetcher->setSelectedMethod($form->get($form::ELEMENT_METHOD)->getValue());
            return $this->redirect()->toRoute('cart/checkout');
        }

        return array('form' => $form);
    }
}