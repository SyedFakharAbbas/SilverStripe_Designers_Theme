<?php
/**
 * HomePage
 *
 * @copyright Copyright © 2019 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace SilverStripe\DeveTheme;

use Page;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;


class HomePage extends Page  {

	private static $has_many = array(
		'Showcases' => Showcase::class
	);

	private static $owns = [
		'Showcases'
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->addFieldsToTab('Root.Showcases', GridField::create(
			'Showcases',
			'Showcases on this Page',
			$this->Showcases(),
			GridFieldConfig_RecordEditor::create()
		));

		return $fields;
	}
}
