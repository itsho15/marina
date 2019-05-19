<?php
namespace App;
use TCG\Voyager\FormFields\AbstractHandler;

class HejryDateCustomfield extends AbstractHandler {
	protected $codename = 'hejry';
	public function createContent($row, $dataType, $dataTypeContent, $options) {
		return view('vendor.voyager.formfields.custom.hejry', [
			'row'             => $row,
			'options'         => $options,
			'dataType'        => $dataType,
			'dataTypeContent' => $dataTypeContent,
		]);
	}
}