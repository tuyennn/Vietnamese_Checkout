<?php

require_once ('Mage/Customer/controllers/AccountController.php');

class GhoSter_VietnameseCheckout_CustomerController extends Mage_Customer_AccountController
{
    /**
     * Create customer account action
     */
    public function createPostAction()
    {
        $message = '';
        $status = 0;
        $errUrl = $this->_getUrl('*/*/create', array('_secure' => true));

        if (!$this->_validateFormKey()) {
            $this->_redirectError($errUrl);
            return;
        }

        /** @var $session Mage_Customer_Model_Session */
        $session = $this->_getSession();


        if (!$this->getRequest()->isPost()) {
            $this->_redirectError($errUrl);
            return;
        }

        $customer = $this->_getCustomer();

        try {
            $errors = $this->_getCustomerErrors($customer);

            if (empty($errors)) {
                $customer->cleanPasswordsValidationData();
                $customer->save();
                $this->_dispatchRegisterSuccess($customer);
                $session->setCustomerAsLoggedIn($customer);
                $status = 1;
            } else {
                $message = '';
                if (is_array($errors)) {
                    foreach ($errors as $errorMessage) {
                        $message.= $this->_escapeHtml($errorMessage).'<br/>';
                    }
                } else {
                    $message = $this->__('Invalid customer data');
                }
            }
        } catch (Mage_Core_Exception $e) {
            $session->setCustomerFormData($this->getRequest()->getPost());
            if ($e->getCode() === Mage_Customer_Model_Customer::EXCEPTION_EMAIL_EXISTS) {
                $url = $this->_getUrl('customer/account/forgotpassword');
                $message = $this->__('There is already an account with this email address. If you are sure that it is your email address, <a href="%s">click here</a> to get your password and access your account.', $url);
            } else {
                $message = $this->_escapeHtml($e->getMessage());
            }

        } catch (Exception $e) {
            $message = $e->getMessage().$this->__('Cannot save the customer.');
        }

        $this->getResponse()->setBody(Mage::helper('core')->jsonEncode(array('status'=>$status, 'message'=>$message)));
    }
    /**
     * Add session error method
     *
     * @param string|array $errors
     */
    protected function _addSessionError($errors)
    {
        $session = $this->_getSession();
        $session->setCustomerFormData($this->getRequest()->getPost());

    }
}