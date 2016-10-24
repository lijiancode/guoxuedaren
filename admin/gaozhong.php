<?php  
error_reporting(E_ALL);  
date_default_timezone_set('Europe/London');  
require_once 'PHPExcel.php';
$objPHPExcel = new PHPExcel(); 
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")  
                             ->setLastModifiedBy("Maarten Balliauw")  
                             ->setTitle("Office 2007 XLSX Test Document")  
                             ->setSubject("Office 2007 XLSX Test Document")  
                             ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")  
                             ->setKeywords("office 2007 openxml php")  
                             ->setCategory("Test result file");  
$objPHPExcel->getActiveSheet()->mergeCells('A1:K1');  
$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);  
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);  
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(17);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(17);
// $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
// $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20); 
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);

$objPHPExcel->setActiveSheetIndex(0)  
            ->setCellValue('A1', '“电信杯”第三届山东省青少年“国学达人”挑战赛总决赛（预赛）')  
            ->setCellValue('A2', '姓名')  
            ->setCellValue('B2', '身份证号')  
            ->setCellValue('C2', '分组')  
            ->setCellValue('D2', '学校')  
            ->setCellValue('E2', '分数')   
            ->setCellValue('F2', '理解运用性多选题')
            ->setCellValue('G2', '理解运用性单选题')
            ->setCellValue('H2', '常识性多选题')
            ->setCellValue('I2', '常识性单选题')
            ->setCellValue('J2', '用时')
            ->setCellValue('K2', '排名');
//数据库连接  
$db = mysql_connect("localhost", "root", "root");  
mysql_select_db("lijian",$db);  //  
mysql_query("SET NAMES UTF8"); //设定编码方式为UTF8  
  
$sqlgroups="select * from detail where classify='高中组'";  
$resultgroups=mysql_query($sqlgroups);  
    $numrows=mysql_num_rows($resultgroups);  
    if ($numrows>0)  
    {  
        $count=2;  
        while($data=mysql_fetch_array($resultgroups))  
        {  
                  $count+=1;  
            $s1="A"."$count";  
            $s2="B"."$count";  
            $s3="C"."$count";  
            $s4="D"."$count";  
            $s5="E"."$count";  
            $s6="F"."$count";  
            $s7="G"."$count";
            $s8="H"."$count";
            $s9="I"."$count";
            $s10="J"."$count";
            $s11="K"."$count";
            $objPHPExcel->setActiveSheetIndex(0)              
                        ->setCellValue($s1, $data['name'])  
                        ->setCellValue($s2, $data['info']." ")  
                        ->setCellValue($s3, $data['classify'])  
                        ->setCellValue($s4, $data['area'])  
                        ->setCellValue($s5, $data['score'])  
                        ->setCellValue($s6, $data['type1'])
                        ->setCellValue($s7, $data['type3'])
                        ->setCellValue($s8, $data['type2'])
                        ->setCellValue($s9, $data['type4'])
                        ->setCellValue($s10, $data['time'])
                        ->setCellValue($s11, $count-2);  
//                      $objPHPExcel->getActiveSheet()->getStyle('$s1')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
                        $objPHPExcel->getActiveSheet()->getStyle('A' . ($count) . ':K' . ($count))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        }  
        $objPHPExcel->getActiveSheet()->getStyle('A2:K2')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    }          
  
// Rename sheet  
$objPHPExcel->getActiveSheet()->setTitle('国学达人');  
  
  
// Set active sheet index to the first sheet, so Excel opens this as the first sheet  
$objPHPExcel->setActiveSheetIndex(0);  
  
  
// Redirect output to a client’s web browser (Excel5)  
header('Content-Type: application/vnd.ms-excel');  
header('Content-Disposition: attachment;filename="国学达人(高中组).xls"');  
header('Cache-Control: max-age=0');  
  
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
$objWriter->save('php://output');  
exit;  
?>  