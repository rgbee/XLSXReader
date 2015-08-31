ExelReader
==========

## What it does ##

ExelReader is a small PHP class for reading data from Microsoft Excel XLSX (OpenXML) and XLS files.  There are some much more comprehensive Excel libraries for PHP, but I created this because I was looking for a library that made it as easy as possible to:

1. Open an Excel file
2. Get a list of the sheets (names and sheetIds)
3. Get the data out from a sheet into an array

ExelReader (XLSXReader) requires the ZIP extension.

Thanks to Sergey Schuchkin for his [SimpleXLSX](http://www.phpclasses.org/package/6279-PHP-Parse-and-retrieve-data-from-Excel-XLS-files.html) library that served as the inspiration for XLSXReader.  While most of it has been rewritten, some of his code still remains.

## Usage ##

Open an Excel file:

```php
require('autoload.php');
$exel = \socialist\exel\Exel::read('sample.xlsx');
```

Get the numbers of sheets:

```php
$numSheets = $exel->getNumSheets();
```

Get a list of the sheets:

```php
$sheets = $exel->getSheetNames();
```

Get a number of collumns:

```php
$numCol = $exel->getNumCols($sheetId);
```

Get a number of rows:

```php
$numCol = $exel->getNumRows($sheetId);
```

Get the value of the sheet cell:

```php
$cellValue = $exel->getValue($numRow, $numCol, $sheetId);
```

Get the data from a sheet:

```php
$data = $exel->getSheetData($sheetId);
``` 

Get the data from a row of the sheet:

```php
$data = $exel->getSheetRowData($numRow, $sheetIndex);
```


## What it doesn't do ##

There are many things XLSXReader does not aim to do:

1. Handle sheets with a large amount of data - XLSXReader uses SimpleXML to read the sheet data, so the entire XML file is read into memory when accessing a sheet.
2. Extract formatting, formulas, comments, headers, footers, properties, or charts
3. Create or edit Excel files

If you need those capabilities, I would take a look at [PHP-Excel](http://phpexcel.codeplex.com/).

