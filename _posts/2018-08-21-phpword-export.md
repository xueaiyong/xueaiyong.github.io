---
layout: post
title:  "PHPWord导出文件"
categories: PHPWord
author: joytom
tags:   PHPWord
---

暑假前的开发一个题库，要求最后的题目生成一个word文档，该代码主要是利用了循环来进行word生成，每一行都有注释。感触非常深的就是，循环是多么重要！！！
```php
       		$id=input('jid');      //获得记录表的id
		vendor('PHPWord.PHPWord');  //调用类库
		vendor('PHPWord.IOFactory');
		Vendor('PHPWord.PHPWord.Writer.Word2007');
		$PHPWord  =  new \PhpWord();
		$section = $PHPWord->createSection();

		$xiangqing=Db::table('tk_jilu')      //查找记录表，要下载那个表的记录
		->where('jid','=',$id)
		->find();
		$where['id']=array('in',$xiangqing["jname"]); //把in和所有的题目id放在一起
		$tiku=db('tk_subject')
		->join('tk_type','tk_type.tid=tk_subject.tid')
		->join('tk_answer','tk_answer.z_id=tk_subject.id')
		->where($where)        //遍历查找所有题目、类型、答案
		->select();        

		$sumtime="总分100分，时间90分钟";    //时间总分
		$str1="选择题"."(每题分)";
		$str2 ="填空题"."(每空分)";
		$str3 ="简答题"."(每空分)";
		$str4 ="代码题"."(每空分)";
		$title = $xiangqing['jtname'];        //获取文章的标题
		$section->addText($title,'rStyle','pStyle');  //给文章增加标题
		$section->addText($sumtime,'cOntent');      //给文章增加分数时间

		$i=1;
		$section->addText($str1,'cOntent');       //填充题目类型，以及分值
		$section->addTextBreak(2);              //换行2行
		foreach($tiku as $arr)
		{
			if($arr['tid']==1){
			$section->addText($i++."、".$arr['name'],'cOntent');   //填充选择题的题目内容
			$xuanxiang=explode(' ',$arr['zname']);      //选择题的内容
	        shuffle($xuanxiang);         //打乱四个选择题的内容
			$xuanze='  A、'.$xuanxiang[0].'    B、'.$xuanxiang[1].'C 、 '.$xuanxiang[2].'     D 、'.$xuanxiang[3];           //打乱后的内容放进数组里
			$section->addText($xuanze,'cOntent');      //填充选择题的内容
			}
			$section->addTextBreak(2);
		}

		//填空题
		$section->addText($str2,'cOntent');
		$section->addTextBreak(2);
		foreach($tiku as $arr){
			if($arr['tid']==2){
			$section->addText($i++."、".$arr['name'],'cOntent');
			}
			$section->addTextBreak(2);
		}

		//简答题
		$section->addText($str3,'cOntent');
		$section->addTextBreak(2);
		foreach($tiku as $arr){
			if($arr['tid']==3){
			$section->addText($i++."、".$arr['name'],'cOntent');
			}
			$section->addTextBreak(1);
		}

		//代码题
		$section->addText($str4,'cOntent');
		$section->addTextBreak(2);
		foreach($tiku as $arr){
			if($arr['tid']==4){
			$section->addText($i++."、".$arr['name'],'cOntent');
			}
			$section->addTextBreak(1);
		}
		
		//以前代码用来设置样式
		$imageStyle=array('width'=>200,'height'=>200);   
		$section->addTextBreak(2);
		$PHPWord->addFontStyle('cOntent', array('bold'=>false, 'size'=>12));
		$PHPWord->addFontStyle('rStyle', array('bold'=>true, 'italic'=>false, 'size'=>16,'align'=>'center'));
		$PHPWord->addParagraphStyle('pStyle', array('align'=>'center', 'spaceAfter'=>100));
		$objWriter = \PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
		header("Content-Type: application/doc");
		header("Content-Disposition: attachment; filename=".$xiangqing['jtname'].date("Y-m-d H：i：s").".doc");  //生成文件名外加日期
		$objWriter->save('php://output');
```
![image.png](https://upload-images.jianshu.io/upload_images/13570975-10f952e896a8fb80.png?imageMogr2/auto-orient/strip%7CimageView2/2/w/1240)

如果对该题库有兴趣，可访问：[题库系统](//demo.wangchuangcode.cn)

一个小小的知识点：在博客中插入超链接的时候，由于网站没有小绿锁，写上http可能就进不去我的网站，但是不写又会localhost