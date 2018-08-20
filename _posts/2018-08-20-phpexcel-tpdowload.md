---
layout: post
title:  "tp导出phpexcel表格"
categories: PHPExcel
author: joytom
tags:   PHPExcel Thinkphp
---

```php
        $xianshi=Db::table('jf_stu')
		->join('jf_class','jf_stu.cid=jf_class.cid')
		->join('jf_school','jf_class.xid=jf_school.xid')
		->join('jf_record','jf_stu.sid=jf_record.sid','left')
		->field('jf_stu.*,jf_class.*,jf_school.*,sum(score)')
		->group('jf_stu.sid')
		->paginate(3);
		Vendor('PHPExcel.PHPExcel');    //调用类库,路径是基于vendor文件夹的
        Vendor('PHPExcel.PHPExcel.Worksheet.Drawing');
        Vendor('PHPExcel.PHPExcel.Writer.Excel2007');
        $objExcel = new \PHPExcel();
        //set document Property
        $objWriter = \PHPExcel_IOFactory::createWriter($objExcel,'Excel2007');  //生成excel文件
        $objActSheet = $objExcel->getActiveSheet();//获取当前活动单元格
        $letter =explode(',',"A,B,C,D,E,F");       //填充表头序号
        $arrHeader = array('姓名','性别','入学时间','班级','学校');  //填充表头信息
        $lenth =  count($arrHeader);          //获得表头个数
        for($i = 0;$i < $lenth;$i++) {   //循环填充表格信息     
            $objActSheet->setCellValue("$letter[$i]1","$arrHeader[$i]");
        };
        foreach($xianshi as $k=>$v){   //循环填充表格内容
            $k +=2;
            $objActSheet->setCellValue('A'.$k,$v['sname']);
            $objActSheet->setCellValue('B'.$k, $v['sex']);
			$objActSheet->setCellValue('C'.$k, $v['intime']);
			$objActSheet->setCellValue('D'.$k, $v['newname']);
			$objActSheet->setCellValue('E'.$k, $v['cname']);
			$objActSheet->setCellValue('F'.$k, $v['school']);
            $objActSheet->getRowDimension($k)->setRowHeight(20);    // 表格高度
        }
		//设置第二行字体大小和加粗
		$objActSheet->getStyle("A2:Z2")->getFont()->setSize(20)->setBold(true);
        $width = array(20,20,15,10,10,30,10,15);
        //设置表格的宽度
        $objActSheet->getColumnDimension('A')->setWidth($width[5]);
        $objActSheet->getColumnDimension('B')->setWidth($width[1]);
        $objActSheet->getColumnDimension('C')->setWidth($width[0]);
        $objActSheet->getColumnDimension('D')->setWidth($width[5]);
        $objActSheet->getColumnDimension('E')->setWidth($width[5]);
        $outfile = "学生信息表.xls";
        ob_end_clean();
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header('Content-Disposition:inline;filename="'.$outfile.'"');
        header("Content-Transfer-Encoding: binary");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: no-cache");
        $objWriter->save('php://output');
```
>**更多介绍参考phpexcel中文手册http://www.thinkphp.cn/topic/53674.html**

