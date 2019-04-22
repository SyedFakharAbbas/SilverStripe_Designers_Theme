<?php
/**
 * HomePageCOntroller
 *
 * @copyright Copyright © 2019 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace SilverStripe\DeveTheme;

use PageController;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;

class ContactPageController extends PageController {

	private static $allowed_actions = ['ContactForm'];

	public function ContactForm() {
		$form = Form::create(
			$this,
			__FUNCTION__,
			FieldList::create(
				TextField::create('Name','')
					->setAttribute('placeholder','Name*')
					->addExtraClass('w3-input w3-border'),
				EmailField::create('Email', '')
					->setAttribute('placeholder','Email*')
					->addExtraClass('w3-input w3-border'),
				TextareaField::create('Message', '')
					->setAttribute('placeholder','Message*')
					->addExtraClass('w3-input w3-border')
			),
			FieldList::create(
				FormAction::create('sendContactForm', 'Send Form')
					->setUseButtonTag(true)
					->addExtraClass('w3-button w3-block w3-padding-large w3-red w3-margin-bottom')
			),
			RequiredFields::create('Name', 'Email', 'Message')
		);

		return $form;
	}

	public function sendContactForm($data, $form) {

		$name = $data['Name'];
		$form->sessionMessage('Thanks '. $name . ' we have received your message', 'good');

		return $this->redirectBack();
	}

}
