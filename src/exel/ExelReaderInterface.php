<?php

namespace socialist\exel;


interface ExelReaderInterface
{
	/**
	 * Метод возвращает количество листов с таблицами
	 * @return Int
	 */
	public function getNumSheets();

	/**
	 * returns an array of sheet names, indexed by sheetId
	 * @return Array
	 */
	public function getSheetNames();

	/**
	 * Возвращает название листа с таблицей
	 * @param  Integer $sheetIndex Числовой индекс листа
	 * @return String
	 */
	public function getSheetName($sheetIndex);

	/**
	 * Количество столбцов в таблице
	 * @param  integer $sheetIndex Числовой индекс листа
	 * @return Integer
	 */
	public function getNumRows($sheetIndex = 0);

	/**
	 * Количество рядов в таблице
	 * @param  integer $sheetIndex Числовой индекс листа
	 * @return Integer
	 */
	public function getNumCols($sheetIndex = 0);

	/**
	 * Возвращает значение из таблицы с индексом $sheet
	 * из столбца $col и ряда $row
	 * @param  Integer  $row   Ряд таблицы
	 * @param  Integer  $col   столбец
	 * @param  integer $sheet Числовой индекс листа
	 * @return mixed
	 */
	public function getValue($row, $col, $sheet = 0);

	/**
	 * Возвращает все ряды таблицы в массиве
	 * @param  Integer $sheetIndex Числовой индекс листа
	 * @return Array
	 */
	public function getSheetData($sheetIndex);

	/**
	 * Возвращает ряд под номером $rowNum из
	 * таблицы с индексом $sheetIndex
	 * @param  Integer $rowNum     Номер ряда
	 * @param  Integer $sheetIndex Числовой индекс листа
	 * @return Array
	 */
	public function getSheetRowData($rowNum, $sheetIndex);
}