<?php
namespace App;
use TCG\Voyager\FormFields\AbstractHandler;

class ArrayField extends AbstractHandler {
	protected $codename = 'array';
	public function createContent($row, $dataType, $dataTypeContent, $options) {
		return view('vendor.voyager.formfields.custom.array', [
			'row'             => $row,
			'options'         => $options,
			'dataType'        => $dataType,
			'dataTypeContent' => $dataTypeContent,
		]);
	}
}