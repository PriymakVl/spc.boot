<?php

namespace app\modules\product\classes;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ProductUploadExcel extends Model
{

    public $excelFile;

    public function rules()
    {
        return [
            [['excelFile'], 'required'],
            [['excelFile'], 'file', 'extensions' => 'xls'],
        ];
    }
    

    public function addProducts()
    {
        /**  Identify the type of $inputFileName  **/
        $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($this->excelFile);
        /**  Create a new Reader of the type that has been identified  **/
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        /**  Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($this->excelFile);
        /**  Convert Spreadsheet Object to an Array for ease of use  **/
        $schdeules = $spreadsheet->getActiveSheet()->toArray();
        debug($schdeules);
    }



}