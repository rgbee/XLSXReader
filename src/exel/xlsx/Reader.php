<?php

namespace socialist\exel\xlsx;

use socialist\exel\xlsx\XLSXReader;
use socialist\exel\ExelReaderInterface;
/**
* 
*/
class Reader extends XLSXReader implements ExelReaderInterface
{
	
	function __construct($file, $config = [])
	{
		parent::__construct($file, $config);
	}

	public function getNumSheets()
	{
		return $this->getSheetCount();
	}

	/**
	 * @inheritdoc
	 */
	public function getSheetName($sheetIndex)
	{
		return $this->getSheetNameById($this->getRealSheetIndex($sheetIndex));
	}

	/**
	 * @inheritdoc
	 */
	public function getNumRows($sheetIndex = 0)
	{
		return count($this->getSheetData($this->getRealSheetIndex($sheetIndex)));
	}

	/**
	 * @inheritdoc
	 */
	public function getNumCols($sheetIndex = 0)
	{
		$sheet = $this->getSheetData($this->getRealSheetIndex($sheetIndex));

		return count($sheet[0]);
	}

	/**
	 * @inheritdoc
	 */
	public function getValue($row, $col, $sheetIndex = 0)
	{
		$sheet = $this->getSheetData($this->getRealSheetIndex($sheetIndex));
		$row--;

		if(array_key_exists($row, $sheet) && array_key_exists($col, $sheet[$row])) {
			return $sheet[$row][$col];
		}

		return null;
	}

	/**
	 * @inheritdoc
	 */
	public function getSheetData($sheetIndex)
	{
		return parent::getSheetData($this->getRealSheetIndex($sheetIndex));
	}

	/**
	 * @inheritdoc
	 */
	public function getSheetRowData($rowNum, $sheetIndex)
	{
		$sheet = $this->getSheetData($this->getRealSheetIndex($sheetIndex));
		$rowNum--;

		if(array_key_exists($rowNum, $sheet)) {
			return $sheet[$rowNum];
		}
		return [];
	}

	private function getRealSheetIndex($index)
	{
		$sheets = $this->getSheetNames();
		$i = 0;

		foreach($sheets as $key => $value) {
			if($index === $i) {
				return $key;
			}
			$i++;
		}
	}
}