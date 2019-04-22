<?php
/**
 * Showcase
 *
 * @copyright Copyright © 2019 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace SilverStripe\DeveTheme;

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;

class Showcase extends DataObject {

	private static $db = array(
		'Title' => 'Varchar'
	);

	private static $has_one = array(
		'Photo' => Image::class,
		'HomePage' => HomePage::class
	);

	private static $owns = [
		'Photo',
	];

	private static $summary_fields= [
		'ShowcasePhotoThumbnail' => 'Show Case Image',
		'Title' => 'Title'
	];

	private static $table_name = 'Showcases';

	public function getShowcasePhotoThumbnail()
	{
		if($this->Photo()->exists()) {
			return $this->Photo()->ScaleWidth(100);
		}

		return "(no image)";
	}

	public function getCMSFields()
	{
		$fields = FieldList::create(
			TextField::create('Title'),
			$uploader = UploadField::create('Photo')

		);

		$uploader->setFolderName('showcases-photos');
		$uploader->getValidator()->setAllowedExtensions(array(
			'png', 'gif', 'jpeg', 'jpg'
		));

		return $fields;
	}

}