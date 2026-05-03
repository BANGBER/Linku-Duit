<?php

namespace App\Controller\Member;

use App\Form\ContactForm;

/**
 * @property \App\Controller\Component\CaptchaComponent $Captcha
 * @property \Cake\ORM\Table $Forms
 */
class FormsController extends AppMemberController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function support()
    {
        $contact = new ContactForm();

        if ($this->getRequest()->is('post')) {
            if ($contact->execute($this->getRequest()->data)) {
                $this->Flash->success(__('We will get back to you soon.'));

                return $this->redirect(['action' => 'support']);
            } else {
                $this->Flash->error(__('There was a problem submitting your form.'));
            }
        }
        $this->set('contact', $contact);
    }
}
