<?php
/**
 * DesignersPage
 *
 * @copyright Copyright © 2019 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */
namespace SilverStripe\DeveTheme;

use Page;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class DesignersPage extends Page {

	private static $has_many = array(
		'Designers' => Designer::class
	);

	private static $owns = [
		'Designers'
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->addFieldsToTab('Root.Designers', GridField::create(
			'Designers',
			'Designers on this Page',
			$this->Designers(),
			GridFieldConfig_RecordEditor::create()
		));

		return $fields;
	}
}