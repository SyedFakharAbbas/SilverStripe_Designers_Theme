<?php
/**
 * Designer
 *
 * @copyright Copyright © 2019 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace SilverStripe\DeveTheme;

use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;

class Designer extends DataObject {

	private static $db = array(
		'Name' => 'Varchar',
		'Designation' => 'Varchar',
		'Bio' => 'Varchar'
	);

	private static $has_one = array(
		'Photo' => Image::class,
		'DesignersPage' => DesignersPage::class
	);

	private static $owns = [
		'Photo',
	];

	private static $summary_fields= [
		'DesignerPhotoThumbnail' => '',
		'Name' => 'Name',
		'Designation' => 'Designation',
		'Bio' => 'Biography'

	];

	private static $table_name = 'Designers';

	public function getDesignerPhotoThumbnail()
	{
		if($this->Photo()->exists()) {
			return $this->Photo()->ScaleWidth(100);
		}

		return "(no image)";
	}

	public function getCMSFields()
	{
		$fields = FieldList::create(
			TextField::create('Name'),
			TextField::create('Designation'),
			TextareaField::create('Bio'),
			$uploader = UploadField::create('Photo')

		);

		$uploader->setFolderName('designers-photos');
		$uploader->getValidator()->setAllowedExtensions(array(
			'png', 'gif', 'jpeg', 'jpg'
		));

		return $fields;
	}

}