<?php
/**
* edit by charles.nhzc  
*    at 2013-05-23
*Email:charles.nhzc@gmail.com
**/
class Smj
{

//获得用户最新评价
	static public function getFeedbackPoint()
	{
		$options = array ();
		
		$options['select']='*';
		
		$options['order']=' order by time desc';
		
		$options['one']='true';
		
		$datamodel = DB::LimitQuery('smj_feedbackPoint',$options);
		
		return $datamodel;
	
	
	}
//-------------------------------------------------




	
//获取关键产品指标
	static public function getKeyPoint()
	{
		$options = array ();
		
		$options['select']='*';
		
		$options['order']=' order by time desc';
		
		$options['one']='true';
		
		$datamodel = DB::LimitQuery('smj_keypoint',$options);
		
		return $datamodel;
	}
//-------------------------------------------------





//获取用户评价
	static public function getUserPoint()
	{
		$options = array ();
		
		$options['select']='*';
		
		$options['order']=' order by time desc';
		
		$options['size'] = ' 3 ';
		
		$datamodel = DB::LimitQuery('smj_userpoint',$options);
		
		return $datamodel;
	}
//-------------------------------------------------


//获取用户评价
	static public function getResponse()
	{
		$options = array ();
		
		$options['select']='*';
		
		$options['order']=' order by time desc';
		
		$options['one'] = 'true';
		
		$datamodel = DB::LimitQuery('smj_response',$options);
		
		return $datamodel;
	}
//-------------------------------------------------



//获取highlight表格数据
	static public function getHighlight()
	{
		$options = array ();
		
		$options['select']='*';
		
		$options['order']=' order by time desc';
		
		$options['size'] = ' 3 ';
		
		$datamodel = DB::LimitQuery('smj_highlight',$options);
		
		return $datamodel;
	}
//-------------------------------------------------





//获取雷达图数据
	static public function getRadar()
	{
		$options = array ();
		
		$options['select']='*';
		
		$options['order']=' order by time desc';
		
		$options['size'] = ' 3 ';
		
		$datamodel = DB::LimitQuery('smj_radar',$options);
		
		return $datamodel;
	}
//-------------------------------------------------



//获取精度报告数据
//type 1为simeji 2为ATOK 3为google
	static public function getAccuracy()
	{
		$options = array ();
		
		$simeji = array();
		
		$options['select']='*';
		
		$options['order']=' order by id asc ';
		
		$options['one'] = false;
		
		$options['condition'] = array ('type' => 1);
		
		$simeji = DB::LimitQuery('smj_accuracy',$options);
	

		$options['one'] = 'true';
		
		$options['condition']=' type=3 ';
		
		$google = DB::LimitQuery('smj_accuracy',$options);
		
		$options['condition']=' type=2 ';
		
		$ATOK = DB::LimitQuery('smj_accuracy',$options);
		
		$datamodel = array();
		
		$datamodel['google']=$google;
		
		$datamodel['simeji']=$simeji;
		
		$datamodel['ATOK']=$ATOK;
	
		return $datamodel;
	}
//-------------------------------------------------


//获得资源消耗报告数据

//type 1为simeji 2为ATOK 3为google
	static public function getResource()
	{
		$options = array ();
		
		$simeji = array();
		
		$options['select']='*';
		
		$options['order']=' order by id asc ';
		
		$options['one'] = false;
		
		$options['condition'] = array ('type' => 1);
		
		$simeji = DB::LimitQuery('smj_resource',$options);
	

		$options['one'] = 'true';
		
		$options['condition']=' type=3 ';
		
		$google = DB::LimitQuery('smj_resource',$options);
		
		$options['condition']=' type=2 ';
		
		$ATOK = DB::LimitQuery('smj_resource',$options);
		
		$datamodel = array();
		
		$datamodel['google']=$google;
		
		$datamodel['simeji']=$simeji;
		
		$datamodel['ATOK']=$ATOK;
	
		return $datamodel;
	}
	
	
//------------------------------------------------------


//获得smj上面所有文案

static public function getComment()
	{
		$options = array ();		
		
		$options['select']='*';
			
		$datamodel = DB::LimitQuery('smj_comment',$options);	
	
		return $datamodel;
	}
	







//-------------------------------------------------------



//更新simeji上面的文案

static public function setHtml($type,$comment)
{
	$datamodel=array();
	 
	
	$datamodel['type']=$type;
	$datamodel['comment']=$comment;
   
    $options = array ();
    $options['select']='id';
	$options['condition'] = array ('type' => $type);
	$options['one'] = true;
	
	$testmodel = DB :: LimitQuery('smj_comment', $options);
	
	
	
	if($testmodel)
	{
      $oRet = DB :: Update('smj_comment', $testmodel['id'],$datamodel,'id');
	  return 1;
	}
	
	$oRet = DB :: Insert('smj_comment', $datamodel);
	
	


}


//--------------------------------------------------------


//更新雷达图的数据

static public function setRadar($rd_simeji_package,$rd_simeji_accuracy,$rd_simeji_response,$rd_simeji_pss,$rd_simeji_cpu,$rd_google_package,$rd_google_accuracy,$rd_google_response,$rd_google_pss,$rd_google_cpu,$rd_ATOK_package,$rd_ATOK_accuracy,$rd_ATOK_response,$rd_ATOK_pss,$rd_ATOK_cpu)
{
	
	$simeji['version']='simeji';
	$simeji['package']=$rd_simeji_package;
	$simeji['accuracy']=$rd_simeji_accuracy;
	$simeji['response']=$rd_simeji_response;
	$simeji['pss']=$rd_simeji_pss;
	$simeji['cpu']=$rd_simeji_cpu;

	
	$oRet = DB :: Insert('smj_radar',$simeji);
	
	$google['version']='google';
	$google['package']=$rd_google_package;
	$google['accuracy']=$rd_google_accuracy;
	$google['response']=$rd_google_response;
	$google['pss']=$rd_google_pss;
	$google['cpu']=$rd_google_cpu;

	
	$oRet = DB :: Insert('smj_radar',$google);
	
	$ATOK['version']='ATOK';
	$ATOK['package']=$rd_ATOK_package;
	$ATOK['accuracy']=$rd_ATOK_accuracy;
	$ATOK['response']=$rd_ATOK_response;
	$ATOK['pss']=$rd_ATOK_pss;
	$ATOK['cpu']=$rd_ATOK_cpu;

	
	$oRet = DB :: Insert('smj_radar',$ATOK);
	
	
	


}




//--------------------------------------------------------




//更新产品关键指标数据

static public function setKeyPoint($version,$mau,$retention)
{
	

	$datamodel['version']=$version;
	$datamodel['mau']=$mau;
	$datamodel['retention']=$retention;

    $oRet = DB :: Insert('smj_keypoint',$datamodel);




}






//-------------------------------------------------------





//更新用户评价数据



static public function setUserPoint($us_simeji_point,$us_google_point,$us_ATOK_point,$us_simeji_num,$us_google_num,$us_ATOK_num)
{
	

	$simeji['point']=$us_simeji_point;
	$simeji['num']=$us_simeji_num;
	$simeji['version']='simeji';
    $oRet = DB :: Insert('smj_userpoint',$simeji);

	
	$google['point']=$us_google_point;
	$google['num']=$us_google_num;
	$google['version']='google';
	$oRet = DB :: Insert('smj_userpoint',$google);

	$ATOK['point']=$us_ATOK_point;
	$ATOK['num']=$us_ATOK_num;
	$ATOK['version']='ATOK';
	$oRet = DB :: Insert('smj_userpoint',$ATOK);

	




}

//-------------------------------------------------------




//设置最新simeji覆盖率



static public function setSimeji($ac_simeji_version,$ac_simeji_top1,$ac_simeji_top6,$ac_simeji_top12)
{
	

	$simeji['top1']=$ac_simeji_top1;
	$simeji['top6']=$ac_simeji_top6;
	$simeji['version']=$ac_simeji_version;
	$simeji['top12']=$ac_simeji_top12;
	$simeji['type']=1;
	
	 
	
	
   
    $options = array ();
    $options['select']='id';
	$options['condition'] = array ('version' => $ac_simeji_version);
	$options['one'] = true;
	
	$testmodel = DB :: LimitQuery('smj_accuracy', $options);
	
	
	
	if($testmodel)
	{
      $oRet = DB :: Update('smj_accuracy', $testmodel['id'],$simeji,'id');
	  
	}
	else
	$oRet = DB :: Insert('smj_accuracy', $simeji);
	

	




}

//-------------------------------------------------------


//设置最新google覆盖率



static public function setGoogle($ac_google_version,$ac_google_top1,$ac_google_top6,$ac_google_top12)
{
	

	$google['top1']=$ac_google_top1;
	$google['top6']=$ac_google_top6;
	$google['version']=$ac_google_version;
	$google['top12']=$ac_google_top12;
	$google['type']=3;
	
	 
	
	
   
    $options = array ();
    $options['select']='id';
	$options['condition'] = array ('type' => 3);
	$options['one'] = true;
	
	$testmodel = DB :: LimitQuery('smj_accuracy', $options);
	
	
	
	if($testmodel)
	{
      $oRet = DB :: Update('smj_accuracy', $testmodel['id'],$google,'id');
	  
	}
	
	

	




}

//-------------------------------------------------------



//设置最新simeji覆盖率



static public function setATOK($ac_ATOK_version,$ac_ATOK_top1,$ac_ATOK_top6,$ac_ATOK_top12)
{
	

	$ATOK['top1']=$ac_ATOK_top1;
	$ATOK['top6']=$ac_ATOK_top6;
	$ATOK['version']=$ac_ATOK_version;
	$ATOK['top12']=$ac_ATOK_top12;
	$ATOK['type']=2;
	
	 
	
	
   
    $options = array ();
    $options['select']='id';
	$options['condition'] = array ('type' => 2);
	$options['one'] = true;
	
	$testmodel = DB :: LimitQuery('smj_accuracy', $options);
	
	
	
	if($testmodel)
	{
      $oRet = DB :: Update('smj_accuracy', $testmodel['id'],$ATOK,'id');
	  
	}
	
	

	




}

//-------------------------------------------------------


//设置最新用户评价图



static public function setFeedbackPoint($point5,$point4,$point3,$point2,$point1)
{
	
	$datamodel['point5']=$point5;
	$datamodel['point4']=$point4;
	$datamodel['point3']=$point3;
	$datamodel['point2']=$point2;
	$datamodel['point1']=$point1;
	
	
	$oRet = DB :: Insert('smj_feedbackpoint', $datamodel);
	

	




}

//-------------------------------------------------------









//设置最新simeji资源消耗



static public function setReSimeji($re_simeji_version,$re_simeji_cpu,$re_simeji_pss)
{
	

	$simeji['cpu']=$re_simeji_cpu;
	$simeji['pss']=$re_simeji_pss;
	$simeji['version']=$re_simeji_version;
	
	$simeji['type']=1;
	
	 
	
	
   
    $options = array ();
    $options['select']='id';
	$options['condition'] = array ('version' => $re_simeji_version);
	$options['one'] = true;
	
	$testmodel = DB :: LimitQuery('smj_resource', $options);
	
	
	
	if($testmodel)
	{
      $oRet = DB :: Update('smj_resource', $testmodel['id'],$simeji,'id');
	  
	}
	else
	$oRet = DB :: Insert('smj_resource', $simeji);
	

	




}

//-------------------------------------------------------


//设置最新google资源消耗



static public function setReGoogle($re_google_version,$re_google_cpu,$re_google_pss)
{
	

	$google['cpu']=$re_google_cpu;
	$google['pss']=$re_google_pss;
	$google['version']=$re_google_version;
	
	$google['type']=3;
	
	 
	
	
   
    $options = array ();
    $options['select']='id';
	$options['condition'] = array ('type' => 3);
	$options['one'] = true;
	
	$testmodel = DB :: LimitQuery('smj_resource', $options);
	
	
	
	if($testmodel)
	{
      $oRet = DB :: Update('smj_resource', $testmodel['id'],$google,'id');
	  
	}
	
	

	




}

//-------------------------------------------------------



//设置最新ATOK资源覆盖



static public function setReATOK($re_ATOK_version,$re_ATOK_cpu,$re_ATOK_pss)
{
	

	$ATOK['cpu']=$re_ATOK_cpu;
	$ATOK['pss']=$re_ATOK_pss;
	$ATOK['version']=$re_ATOK_version;
	
	$ATOK['type']=2;
	
	 
	
	
   
    $options = array ();
    $options['select']='id';
	$options['condition'] = array ('type' => 2);
	$options['one'] = true;
	
	$testmodel = DB :: LimitQuery('smj_resource', $options);
	
	
	
	if($testmodel)
	{
      $oRet = DB :: Update('smj_resource', $testmodel['id'],$ATOK,'id');
	  
	}
	
	

	




}

//-------------------------------------------------------




//设置新的亮点功能对比

static public function setHighlight($ATOK_version,$ATOK_skin,$ATOK_cell,$ATOK_cloud,$ATOK_font,$google_version,$google_skin,$google_cell,$google_cloud,$google_font,$simeji_version,$simeji_skin,$simeji_cell,$simeji_cloud,$simeji_font)
{
	
	
	
			$ATOK['version']=$ATOK_version;
			$ATOK['skin']=$ATOK_skin;
			$ATOK['cell']=$ATOK_cell;
			$ATOK['cloud']=$ATOK_cloud;
			$ATOK['font']=$ATOK_font;
			$ATOK['type']=2;
			
			$google['version']=$google_version;
			$google['skin']=$google_skin;
			$google['cell']=$google_cell;
			$google['cloud']=$google_cloud;
			$google['font']=$google_font;
			$google['type']=3;
			
			$simeji['version']=$simeji_version;
			$simeji['skin']=$simeji_skin;
			$simeji['cell']=$simeji_cell;
			$simeji['cloud']=$simeji_cloud;
			$simeji['font']=$simeji_font;
			$simeji['type']=1;
			
			
			
			$oRet = DB :: Insert('smj_highlight', $ATOK);
			$oRet = DB :: Insert('smj_highlight', $google);
			$oRet = DB :: Insert('smj_highlight', $simeji);
			
			

}


//--------------------------------------------------------






//设置最新response内容



static public function setResponse($simeji,$ATOK,$google)
{
	

	$datamodel['atok']=$ATOK;
	$datamodel['simeji']=$simeji;
	$datamodel['google']=$google;
	
	
	$oRet = DB :: Insert('smj_response', $datamodel);

	




}

//-------------------------------------------------------






}

?>