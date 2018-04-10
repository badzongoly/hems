<?php
/**
 * Created by PhpStorm.
 * User: jerome
 * Date: 13/01/2018
 * Time: 03:47 PM
 */

//setting up data directory
$MainDir['DataDir'] = '../../upload';
//setting up sub folder it create automatically
$MainDir['subfolder'] = 'PMVEXCEL';

require_once('../../classes/projects.class.php');
//require_once('../../classes/PHPExcel.php');
require_once('../../classes/Files.php');
/** Include PHPExcel_IOFactory */
require_once('../../vendor/phpoffice/phpexcel/Classes/PHPExcel/IOFactory.php');
$checknew = '';
$excel = new PHPExcel();
$object = new Project();
$file = new Files();
if(isset($_POST['do']) && $_POST['do'] == "CreateProject"){
    $check = $object->setProject($_POST['name'],$_POST['description'],$_POST['status'],$_POST['partner_id'],$_POST['programme_id'],$_POST['pmv'],$_POST['spot_check'],$_POST['audit'],$_POST['start_date'],$_POST['duration']);
    if($check == "ok"){
        echo $object->getProjects();exit;
    }else{
        echo "error";
    }
}

if(isset($_POST['id']) && isset($_POST['do_action']) && $_POST['do_action'] == "delete" ){
    echo $object->deleteProject($_POST['id']);exit;
}
if(isset($_FILES["file"]["type"]) && isset($_POST['do']) && $_POST['do'] == "excelUpload"){
    $date = date('Y-m-d');
    $sql ='';
    $path = $file->FileUpload(['file'=>$_FILES['file'],'target'=>'../../upload/excel/'.$date,'filetype'=>'docs']);
    //echo $path;
    $file_tmp = $_FILES['file']['tmp_name'];

    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
    $objPHPExcel = $objReader->load($file_tmp);
    $excelRows = array();

    //var_dump($objPHPExcel);

    foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {

        foreach ($worksheet->getRowIterator(10) as $row) {
           // echo '    Row number - ' , $row->getRowIndex();

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
            foreach ($cellIterator as $cell) {
                if (!is_null($cell) && ($cell->getCoordinate() === 'A'.$row->getRowIndex() ||$cell->getCoordinate() === 'G'.$row->getRowIndex() ||$cell->getCoordinate() === 'H'.$row->getRowIndex() ||$cell->getCoordinate() === 'K'.$row->getRowIndex())) {

                    if(substr($cell->getCoordinate(),0,1) === 'A'){
                        $excelRows['A'][$row->getRowIndex()] = $cell->getCalculatedValue();
                    } elseif(substr($cell->getCoordinate(),0,1) === 'G'){
                        $excelRows['G'][$row->getRowIndex()] = $object->getPMV($cell->getCalculatedValue());
                    } if(substr($cell->getCoordinate(),0,1) === 'H'){
                        $excelRows['H'][$row->getRowIndex()] = $object->getPMV($cell->getCalculatedValue());
                    } if(substr($cell->getCoordinate(),0,1) === 'K'){
                        $excelRows['K'][$row->getRowIndex()] = $cell->getCalculatedValue();
                    }
                    //echo '        Cell - ' , $cell->getCoordinate() , ' - ' , $cell->getCalculatedValue();
                }
            }
        }
    }

    $table = 'activities_trans';
    for($x = 10 ;$x<sizeof($excelRows['A']);$x++){
        $valuesArray['partner_id'] = MySQL::SQLValue($excelRows['A'][$x]);
        //$valuesArray['pmv'] = MySQL::SQLValue($excelRows['G'][$x]);
        if(empty($excelRows['G'][$x])){$valuesArray['pmv'] = 0;}else{$valuesArray['pmv']= MySQL::SQLValue($excelRows['G'][$x]);}
        if(empty($excelRows['H'][$x])){ $valuesArray['spot_check'] =0;}else{  $valuesArray['spot_check'] =MySQL::SQLValue($excelRows['H'][$x]);}

        $valuesArray['audit'] = MySQL::SQLValue($excelRows['K'][$x]);
        $valuesArray['status'] = MySQL::SQLValue('New');
        $valuesArray['created_by']=MySQL::SQLValue($_SESSION['hems_User']['user_id']);
        $valuesArray['value_month'] = MySQL::SQLValue($_POST['month']);
        $valuesArray['value_year'] = MySQL::SQLValue($_POST['year']);
        if(empty($sql)) {
            $sql = MySQL::BuildSQLInsert($table, $valuesArray);
        }else{
            $sql.=",".substr(MySQL::BuildSQLInsert($table, $valuesArray),136);
        }
    }

    $check = $object->Query($sql);
    if($check){
        echo "success";exit;
    }else{
        echo "error";exit;
    }
}
if(isset($_FILES["file"]["type"]) && isset($_POST['do']) && $_POST['do'] == "PMVExcelUpload"){
    $date = date('Y-m-d');
    $sql ='';
    $path = $file->FileUpload(['file'=>$_FILES['file'],'target'=>'../../upload/excel/'.$date,'filetype'=>'docs']);
    //echo $path;
    $file_tmp = $_FILES['file']['tmp_name'];

    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
    $objPHPExcel = $objReader->load($file_tmp);
    $excelRows = array();

    //var_dump($objPHPExcel);
    $vendor = '';
    $risk_rating= '';
    foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {

        foreach ($worksheet->getRowIterator(6) as $row) {
           // echo '    Row number - ' , $row->getRowIndex();

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
                foreach ($cellIterator as $cell) {
                    if (!is_null($cell) && ($cell->getCoordinate() === 'A' . $row->getRowIndex() || $cell->getCoordinate() === 'B' . $row->getRowIndex() || $cell->getCoordinate() === 'C' . $row->getRowIndex()|| $cell->getCoordinate() === 'D' . $row->getRowIndex()) && $cell->getCalculatedValue() != "Grand Total") {

                        if (substr($cell->getCoordinate(), 0, 1) === 'A') {
                            if (!empty($cell->getCalculatedValue())) {
                                $excelRows['A'][$row->getRowIndex()] = $cell->getCalculatedValue();
                                $vendor = $cell->getCalculatedValue();
                            } else {
                                $excelRows['A'][$row->getRowIndex()] = $vendor;
                            }
                        } elseif (substr($cell->getCoordinate(), 0, 1) === 'B') {
                            if (!empty($cell->getCalculatedValue())) {
                                $excelRows['B'][$row->getRowIndex()] = $cell->getCalculatedValue();
                                $risk_rating = $cell->getCalculatedValue();
                            } else {
                                $excelRows['B'][$row->getRowIndex()] = $risk_rating;
                            }
                        }
                        if (substr($cell->getCoordinate(), 0, 1) === 'C') {
                            $excelRows['C'][$row->getRowIndex()] = $cell->getCalculatedValue();
                        }
                        if (substr($cell->getCoordinate(), 0, 1) === 'D') {
                            $excelRows['D'][$row->getRowIndex()] = $cell->getCalculatedValue();
                        }
                    }
            }
        }
    }
    $object->Query('Select * From pmv_sheet');
    $rowCount = $object->RowCount();
    while (!$object->EndOfSeek()){
        $row = $object->Row();
        $vsArray['vendor'] = MySQL::SQLValue($row->vendor);
        $vsArray['risk_rating'] = MySQL::SQLValue($row->risk_rating);
        $vsArray['amount'] = MySQL::SQLValue($row->amount);
        $vsArray['created_by']=MySQL::SQLValue($_SESSION['hems_User']['user_id']);
        $vsArray['outcome_area'] = MySQL::SQLValue($row->outcome_area);
        $vsArray['pmv'] = MySQL::SQLValue($row->pmv);
        $vsArray['date'] = MySQL::SQLValue($row->date);
        if(empty($sql)) {
            $sql = MySQL::BuildSQLInsert("pmv_sheet_trans", $vsArray);
        }else{
            $sql.=",".substr(MySQL::BuildSQLInsert("pmv_sheet_trans", $vsArray),117);
        }
    }
    if($rowCount) {
        $checknew =$object->Query($sql);
    }
    if($checknew){
        $sql = MySQL::BuildSQLDelete("pmv_sheet");
        $object->Query($sql);
    }
    $sql ="";
    $table = 'pmv_sheet';
    //var_dump($excelRows);
    for($x = 6 ;$x<sizeof($excelRows['A'])+6;$x++){
        $vendorID = explode('-',$excelRows['A'][$x]);
        $valuesArray['vendor'] = MySQL::SQLValue(trim($vendorID[sizeof($vendorID)-1]));
        $valuesArray['risk_rating'] = MySQL::SQLValue(trim($excelRows['B'][$x]));
        $valuesArray['amount'] = MySQL::SQLValue(trim($excelRows['D'][$x]));
        $valuesArray['created_by']=MySQL::SQLValue($_SESSION['hems_User']['user_id']);
        $valuesArray['outcome_area'] = MySQL::SQLValue(substr($excelRows['C'][$x],0,2));
        $valuesArray['pmv'] = MySQL::SQLValue($object->getPMVCalculation($excelRows['D'][$x],$excelRows['B'][$x]));
        $valuesArray['date'] = MySQL::SQLValue($_POST['month']."-".$_POST['year']);
        if(empty($sql)) {
            $sql = MySQL::BuildSQLInsert($table, $valuesArray);
        }else{
            $sql.=",".substr(MySQL::BuildSQLInsert($table, $valuesArray),112);
        }
    }
//echo $sql;exit;
    $check = $object->Query($sql);
    if($check){
        echo "success";exit;
    }else{
        echo "error";exit;
    }
}
if(isset($_FILES["file"]["type"]) && isset($_POST['do']) && $_POST['do'] == "excelUploadSpotCheck"){
    $date = date('Y-m-d');
    $sql ='';
    $path = $file->FileUpload(['file'=>$_FILES['file'],'target'=>'../../upload/excel/'.$date,'filetype'=>'docs']);
    //echo $path;
    $file_tmp = $_FILES['file']['tmp_name'];

    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
    $objPHPExcel = $objReader->load($file_tmp);
    $excelRows = array();

    //var_dump($objPHPExcel);
    $vendor = '';
    $risk_rating= '';
    foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {

        foreach ($worksheet->getRowIterator(6) as $row) {
           // echo '    Row number - ' , $row->getRowIndex();

            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
                foreach ($cellIterator as $cell) {
                    if (!is_null($cell) && ($cell->getCoordinate() === 'A' . $row->getRowIndex() || $cell->getCoordinate() === 'B' . $row->getRowIndex() || $cell->getCoordinate() === 'C' . $row->getRowIndex()|| $cell->getCoordinate() === 'D' . $row->getRowIndex()) && $cell->getCalculatedValue() != "Grand Total") {

                        if (substr($cell->getCoordinate(), 0, 1) === 'A') {
                            if (!empty($cell->getCalculatedValue())) {
                                $excelRows['A'][$row->getRowIndex()] = $cell->getCalculatedValue();
                                $vendor = $cell->getCalculatedValue();
                            } else {
                                $excelRows['A'][$row->getRowIndex()] = $vendor;
                            }
                        } elseif (substr($cell->getCoordinate(), 0, 1) === 'B') {
                            if (!empty($cell->getCalculatedValue())) {
                                $excelRows['B'][$row->getRowIndex()] = $cell->getCalculatedValue();
                                $risk_rating = $cell->getCalculatedValue();
                            } else {
                                $excelRows['B'][$row->getRowIndex()] = $risk_rating;
                            }
                        }
                        if (substr($cell->getCoordinate(), 0, 1) === 'C') {
                            $excelRows['C'][$row->getRowIndex()] = $cell->getCalculatedValue();
                        }

                    }
            }
        }
    }
    $object->Query('Select * From spot_checks');
    $rowCount = $object->RowCount();
    while (!$object->EndOfSeek()){
        $row = $object->Row();
        $vsArray['vendor'] = MySQL::SQLValue(trim($row->vendor));
        $vsArray['risk_rating'] = MySQL::SQLValue(trim($row->risk_rating));
        $vsArray['amount'] = MySQL::SQLValue(trim($row->amount));
        $vsArray['created_by']=MySQL::SQLValue($_SESSION['hems_User']['user_id']);
        $vsArray['spot_checks'] = MySQL::SQLValue(trim($row->spot_checks));
        $vsArray['date'] = MySQL::SQLValue($row->date);
        if(empty($sql)) {
            $sql = MySQL::BuildSQLInsert("spot_checks_trans", $vsArray);
        }else{
            $sql.=",".substr(MySQL::BuildSQLInsert("spot_checks_trans", $vsArray),111);
        }
    }
    //echo $sql;exit;
    if($rowCount) {
        $checknew =$object->Query($sql);
    }
    if($checknew){
        $sql = MySQL::BuildSQLDelete("spot_checks");
        $object->Query($sql);
    }
    $sql ="";
    $table = 'spot_checks';
    //var_dump($excelRows);
    for($x = 6 ;$x<sizeof($excelRows['A'])+6;$x++){
        $vendorID = explode('-',$excelRows['A'][$x]);
        $valuesArray['vendor'] = MySQL::SQLValue(trim($vendorID[sizeof($vendorID)-1]));
        $valuesArray['risk_rating'] = MySQL::SQLValue($excelRows['B'][$x]);
        $valuesArray['amount'] = MySQL::SQLValue($excelRows['C'][$x]);
        $valuesArray['created_by']=MySQL::SQLValue($_SESSION['hems_User']['user_id']);
        $valuesArray['spot_checks'] = MySQL::SQLValue($object->getSpotCheckCalculation($excelRows['C'][$x],$excelRows['B'][$x]));
        $valuesArray['date'] = MySQL::SQLValue($_POST['month']."-".$_POST['year']);
        if(empty($sql)) {
            $sql = MySQL::BuildSQLInsert($table, $valuesArray);
        }else{
            $sql.=",".substr(MySQL::BuildSQLInsert($table, $valuesArray),106);
        }
    }
//echo $sql;exit;
    $check = $object->Query($sql);
    if($check){
        echo "success";exit;
    }else{
        echo "error";exit;
    }
}
if(isset($_POST['do']) && $_POST['do'] == "getNewList"){
    echo $object->getConfirmationPMV();exit;
}
if(isset($_POST['do']) && $_POST['do'] == "getNewListSpotCheck"){
    echo $object->getConfirmationSPOTCHECK();exit;
}
if(isset($_POST['do']) && $_POST['do'] == "cancel"){
        echo $object->deleteActivities();exit;
}if(isset($_POST['do']) && $_POST['do'] == "confirm"){
        echo $object->moveActivities();exit;
}