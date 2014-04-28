<?php
/**
* edit by charles.nhzc  
*    at 2013-06-06
*Email:charles.nhzc@gmail.com
**/
class BAV
{

//获得comment
	static public function getComment($type)
	{
		$options = array ();
		
		$options['select']='*';
		
		$options['order']=' order by time desc';
		
		$options['one']='true';
		
		$options['condition'] = array ('type' => $type);
		
		$datamodel = DB::LimitQuery('bav_comment',$options);
		
		return $datamodel;
	
	
	}
//-------------------------------------------------



//更新BAV上面的文案

static public function setHtml($type,$comment)
{
	$datamodel=array();
	 
	
	$datamodel['type']=$type;
	$datamodel['comment']=$comment;
   
    $options = array ();
    $options['select']='id';
	$options['condition'] = array ('type' => $type);
	$options['one'] = true;
	
	$testmodel = DB :: LimitQuery('bav_comment', $options);
	
	
	
	if($testmodel)
	{
      $oRet = DB :: Update('bav_comment', $testmodel['id'],$datamodel,'id');
	  return 1;
	}
	
	$oRet = DB :: Insert('bav_comment', $datamodel);
	
	


}

//----------------------------------------------------


//获得summary下面检出率表格数据

static public function getDetectionRate()
{
		$options = array ();
		
		$options['select']='*';
		
		$options['order']=' order by time desc';
		
		$options['size'] = ' 3 ';
		
		$datamodel = DB::LimitQuery('bav_detectionrate',$options);
		
		return $datamodel;



}
	
	
//----------------------------------------------------
	
	
	
//设置最新检出率内容



static public function setDetectionRate($dr_version_bav,$dr_cpu_bav,$dr_memory_bav,$dr_scan_bav,$dr_clean_bav,$dr_c_time_bav,$dr_version_nod,$dr_cpu_nod,$dr_memory_nod,$dr_scan_nod,$dr_clean_nod,$dr_c_time_nod,$dr_version_kis,$dr_cpu_kis,$dr_memory_kis,$dr_scan_kis,$dr_clean_kis,$dr_c_time_kis)
{
	

	$bav['version']=$dr_version_bav;
	$bav['cpu']=$dr_cpu_bav;
	$bav['memory']=$dr_memory_bav;
	$bav['scan']=$dr_scan_bav;
	$bav['clean']=$dr_clean_bav;
	$bav['c_time']=$dr_c_time_bav;
	$bav['type']=1;
	
	
	$oRet = DB :: Insert('bav_detectionrate', $bav);

	

	$nod['version']=$dr_version_nod;
	$nod['cpu']=$dr_cpu_nod;
	$nod['memory']=$dr_memory_nod;
	$nod['scan']=$dr_scan_nod;
	$nod['clean']=$dr_clean_nod;
	$nod['c_time']=$dr_c_time_nod;
	$nod['type']=2;
	
	
	$oRet = DB :: Insert('bav_detectionrate', $nod);
	
	
	$kis['version']=$dr_version_kis;
	$kis['cpu']=$dr_cpu_kis;
	$kis['memory']=$dr_memory_kis;
	$kis['scan']=$dr_scan_kis;
	$kis['clean']=$dr_clean_kis;
	$kis['c_time']=$dr_c_time_kis;
	$kis['type']=3;

	$oRet = DB :: Insert('bav_detectionrate', $kis);

}

//-------------------------------------------------------




//获得summary下面拦截率表格数据

static public function getInterceptRate()
{
		$options = array ();
		
		$options['select']='*';
		
		$options['order']=' order by time desc';
		
		$options['size'] = ' 2 ';
		
		$datamodel = DB::LimitQuery('bav_interceptrate',$options);
		
		return $datamodel;



}
	
	
//----------------------------------------------------


//设置最新拦截率内容



static public function setInterceptRate($ir_version_bav,$ir_sample_bav,$ir_intercept_bav,$ir_version_360 ,$ir_sample_360,$ir_intercept_360)
{
	

	
	$bav['type']=1;
	$bav['version']=$ir_version_bav;
	$bav['sample']=$ir_sample_bav;
	$bav['intercept']=$ir_intercept_bav;
	
	$oRet = DB :: Insert('bav_interceptrate', $bav);

	
	$v360['type']=2;
	$v360['version']=$ir_version_360;
	$v360['sample']=$ir_sample_360;
	$v360['intercept']=$ir_intercept_360;
	
	$oRet = DB :: Insert('bav_interceptrate', $v360);

}

//-------------------------------------------------------



//获得summary下面关键产品数据表格数据

static public function getKeyPoint()
{
		$options = array ();
		
		$options['select']='*';
		
		$options['order']=' order by time desc';
		
		$options['size'] = ' 5 ';
		
		$datamodel = DB::LimitQuery('bav_keypoint',$options);
		
		return $datamodel;



}
	
	
//----------------------------------------------------



//设置最新拦截率内容



static public function setKeyPoint($kp_country_bz,$kp_mau_bz,$kp_organic_bz,$kp_country_id,$kp_mau_id,$kp_organic_id,$kp_country_tl,$kp_mau_tl,$kp_organic_tl,$kp_country_sa,$kp_mau_sa,$kp_organic_sa,$kp_country_uae,$kp_mau_uae,$kp_organic_uae)
{
	

	$bz['type']=1;
	$bz['country']=$kp_country_bz;
	$bz['mau']=$kp_mau_bz;
	$bz['organic']=$kp_organic_bz;
	
	$oRet = DB :: Insert('bav_keypoint', $bz);
	
	$id['type']=2;
	$id['country']=$kp_country_id;
	$id['mau']=$kp_mau_id;
	$id['organic']=$kp_organic_id;
	
	$oRet = DB :: Insert('bav_keypoint', $id);
	
	$tl['type']=3;
	$tl['country']=$kp_country_tl;
	$tl['mau']=$kp_mau_tl;
	$tl['organic']=$kp_organic_tl;
	
	$oRet = DB :: Insert('bav_keypoint', $tl);
	
	$sa['type']=4;
	$sa['country']=$kp_country_sa;
	$sa['mau']=$kp_mau_sa;
	$sa['organic']=$kp_organic_sa;
	
	$oRet = DB :: Insert('bav_keypoint', $sa);
	
	$uae['type']=5;
	$uae['country']=$kp_country_uae;
	$uae['mau']=$kp_mau_uae;
	$uae['organic']=$kp_organic_uae;
	
	
	$oRet = DB :: Insert('bav_keypoint', $uae);

	
	

}

//-------------------------------------------------------



//获得cloud页面下云性能表格
	static public function getClPerformance()
	{
		$options = array ();
		
		$options['select']='*';
		
		$options['order']=' order by time desc';
		
		$options['size'] = ' 2 ';
		
		$datamodel = DB::LimitQuery('bav_clperformance',$options);
		
		return $datamodel;
	
	
	}
//-------------------------------------------------


//设置cloud页面下的云性能最新数据



static public function setClPerformance($cl_version_ol,$cl_cpu_ol,$cl_memory_ol,$cl_response_ol,$cl_capacity_ol,$cl_detection_ol,$cl_overtime_ol,$cl_version_new,$cl_cpu_new,$cl_memory_new,$cl_response_new,$cl_capacity_new,$cl_detection_new,$cl_overtime_new)
{
	

	$ol['version']=$cl_version_ol;
	$ol['cpu']=$cl_cpu_ol;
	$ol['memory']=$cl_memory_ol;
	$ol['response']=$cl_response_ol;
	$ol['capacity']=$cl_capacity_ol;
	$ol['detection']=$cl_detection_ol;
	$ol['overtime']=$cl_overtime_ol;
	$ol['type']=1;
	
		$oRet = DB :: Insert('bav_clperformance', $ol);
	
	$new['version']=$cl_version_new;
	$new['cpu']=$cl_cpu_new;
	$new['memory']=$cl_memory_new;
	$new['response']=$cl_response_new;
	$new['capacity']=$cl_capacity_new;
	$new['detection']=$cl_detection_new;
	$new['overtime']=$cl_overtime_new;
	$new['type']=2;
	
	$oRet = DB :: Insert('bav_clperformance', $new);

	
	

}

//-------------------------------------------------------

//获得cloud页面下云效果表格
	static public function getClEffect()
	{
		$options = array ();
		
		$options['select']='*';
		
		$options['order']=' order by time desc';
		
		$options['size'] = ' 5 ';
		
		$datamodel = DB::LimitQuery('bav_clEffect',$options);
		
		return $datamodel;
	
	
	}
//-------------------------------------------------



//设置cloud页面下的云效果最新数据



static public function setClEffect($clef_version_bavcl,$clef_speed_bavcl,$clef_sample_bavcl,$clef_detection_bavcl,$clef_processed_bavcl,$clef_version_bavncl,$clef_speed_bavncl,$clef_sample_bavncl,$clef_detection_bavncl,$clef_processed_bavncl,$clef_version_eng,$clef_speed_eng,$clef_sample_eng,$clef_detection_eng,$clef_processed_eng,$clef_version_red,$clef_speed_red,$clef_sample_red,$clef_detection_red,$clef_processed_red,$clef_version_nod,$clef_speed_nod,$clef_sample_nod,$clef_detection_nod,$clef_processed_nod)
{
	
	$bavcl['version']=$clef_version_bavcl;
	$bavcl['speed']=$clef_speed_bavcl;
	$bavcl['sample']=$clef_sample_bavcl;
	$bavcl['detection']=$clef_detection_bavcl;
	$bavcl['processed']=$clef_processed_bavcl;
	$bavcl['type']=1;
	
	$oRet = DB :: Insert('bav_cleffect', $bavcl);
	
	
	$bavncl['version']=$clef_version_bavncl;
	$bavncl['speed']=$clef_speed_bavncl;
	$bavncl['sample']=$clef_sample_bavncl;
	$bavncl['detection']=$clef_detection_bavncl;
	$bavncl['processed']=$clef_processed_bavncl;
	$bavncl['type']=2;
	
	$oRet = DB :: Insert('bav_cleffect', $bavncl);
	
	
	$eng['version']=$clef_version_eng;
	$eng['speed']=$clef_speed_eng;
	$eng['sample']=$clef_sample_eng;
	$eng['detection']=$clef_detection_eng;
	$eng['processed']=$clef_processed_eng;
	$eng['type']=3;
	
	$oRet = DB :: Insert('bav_cleffect', $eng);
	
	
	$red['version']=$clef_version_red;
	$red['speed']=$clef_speed_red;
	$red['sample']=$clef_sample_red;
	$red['detection']=$clef_detection_red;
	$red['processed']=$clef_processed_red;
	$red['type']=4;
	
	$oRet = DB :: Insert('bav_cleffect', $red);
	
	
	$nod['version']=$clef_version_nod;
	$nod['speed']=$clef_speed_nod;
	$nod['sample']=$clef_sample_nod;
	$nod['detection']=$clef_detection_nod;
	$nod['processed']=$clef_processed_nod;
	$nod['type']=5;
	
	
	$oRet = DB :: Insert('bav_cleffect', $nod);

	
	

}

//-------------------------------------------------------



//获得intercept下面的表格数据
	static public function getIntercept()
	{
		$options = array ();
		
		$options['select']='*';
		
		$options['order']=' order by time desc';
		
		$options['size'] = ' 2 ';
		
		$datamodel = DB::LimitQuery('bav_intercept',$options);
		
		return $datamodel;
	
	
	}
//-------------------------------------------------



//设置intercept页面下的表格最新数据



static public function setIntercept($in_version_bav,$in_sample_bav,$in_intercept_bav,$in_only360_bav,$in_onlybav_bav,$in_version_360,$in_sample_360,$in_intercept_360,$in_only360_360,$in_onlybav_360)
{
	
	$bav['version']=$in_version_bav;
	$bav['sample']=$in_sample_bav;
	$bav['intercept']=$in_intercept_bav;
	$bav['only360']=$in_only360_bav;
	$bav['onlybav']=$in_onlybav_bav;
	$bav['type']=1;
	
		$oRet = DB :: Insert('bav_intercept', $bav);
	
	$v360['version']=$in_version_360;
	$v360['sample']=$in_sample_360;
	$v360['intercept']=$in_intercept_360;
	$v360['only360']=$in_only360_360;
	$v360['onlybav']=$in_onlybav_360;
	$v360['type']=2;
	

	
	
	
	
	$oRet = DB :: Insert('bav_intercept', $v360);
	
	
	
	
	

}

//-------------------------------------------------------


//获得kill下面的表格数据
	static public function getKill()
	{
		$options = array ();
		
		$options['select']='*';
		
		$options['order']=' order by time desc';
		
		$options['size'] = ' 6 ';
		
		$datamodel = DB::LimitQuery('bav_kill',$options);
		
		return $datamodel;
	
	
	}
//-------------------------------------------------




//设置kill页面下的表格最新数据



static public function setKill($ki_version_1,$ki_kafan_1,$ki_infect_1,$ki_doc_1,$ki_scr_1,$ki_pe_1,
	$ki_version_2,$ki_kafan_2,$ki_infect_2,$ki_doc_2,$ki_scr_2,$ki_pe_2,
	$ki_version_3,$ki_kafan_3,$ki_infect_3,$ki_doc_3,$ki_scr_3,$ki_pe_3,
	$ki_version_4,$ki_kafan_4,$ki_infect_4,$ki_doc_4,$ki_scr_4,$ki_pe_4,
	$ki_version_5,$ki_kafan_5,$ki_infect_5,$ki_doc_5,$ki_scr_5,$ki_pe_5,
	$ki_version_6,$ki_kafan_6,$ki_infect_6,$ki_doc_6,$ki_scr_6,$ki_pe_6)
{
	
	
	$tem['type']=1;
	$tem['version']=$ki_version_1;
	$tem['kafan']=$ki_kafan_1;
	$tem['infect']=$ki_infect_1;
	$tem['doc']=$ki_doc_1;
	$tem['scr']=$ki_scr_1;
	$tem['pe']=$ki_pe_1;
	
		$oRet = DB :: Insert('bav_kill', $tem);
		
	$tem['type']=2;
	$tem['version']=$ki_version_2;
	$tem['kafan']=$ki_kafan_2;
	$tem['infect']=$ki_infect_2;
	$tem['doc']=$ki_doc_2;
	$tem['scr']=$ki_scr_2;
	$tem['pe']=$ki_pe_2;
	
		$oRet = DB :: Insert('bav_kill', $tem);
		
		
	$tem['type']=3;
	$tem['version']=$ki_version_3;
	$tem['kafan']=$ki_kafan_3;
	$tem['infect']=$ki_infect_3;
	$tem['doc']=$ki_doc_3;
	$tem['scr']=$ki_scr_3;
	$tem['pe']=$ki_pe_3;
	
		$oRet = DB :: Insert('bav_kill', $tem);
		
		
	$tem['type']=4;
	$tem['version']=$ki_version_4;
	$tem['kafan']=$ki_kafan_4;
	$tem['infect']=$ki_infect_4;
	$tem['doc']=$ki_doc_4;
	$tem['scr']=$ki_scr_4;
	$tem['pe']=$ki_pe_4;
	
		$oRet = DB :: Insert('bav_kill', $tem);
		
	$tem['type']=5;
	$tem['version']=$ki_version_5;
	$tem['kafan']=$ki_kafan_5;
	$tem['infect']=$ki_infect_5;
	$tem['doc']=$ki_doc_5;
	$tem['scr']=$ki_scr_5;
	$tem['pe']=$ki_pe_5;
	
		$oRet = DB :: Insert('bav_kill', $tem);
		
	$tem['type']=6;
	$tem['version']=$ki_version_6;
	$tem['kafan']=$ki_kafan_6;
	$tem['infect']=$ki_infect_6;
	$tem['doc']=$ki_doc_6;
	$tem['scr']=$ki_scr_6;
	$tem['pe']=$ki_pe_6;
	
		$oRet = DB :: Insert('bav_kill', $tem);
	
	

	
	
	
	
	
	
	
	

}

//-------------------------------------------------------

//获得performance下面的第三个表格数据
	static public function getP3()
	{
		$options = array ();
		
		$options['select']='*';
		
		$options['order']=' order by time desc';
		
		$options['size'] = ' 3 ';
		
		$datamodel = DB::LimitQuery('bav_performance3',$options);
		
		return $datamodel;
	
	
	}
//-------------------------------------------------



//设置performance页面下的第三个表格最新数据



static public function setP3($p3_version_1,$p3_boot_1,$p3_copy_1,$p3_process_1 ,$p3_browser_1,
	$p3_version_2,$p3_boot_2,$p3_copy_2,$p3_process_2 ,$p3_browser_2,
	$p3_version_3,$p3_boot_3,$p3_copy_3,$p3_process_3 ,$p3_browser_3
	)
{
	
	
	$tem['type']=1;
	$tem['version']=$p3_version_1;
	$tem['boot']=$p3_boot_1;
	$tem['copy']=$p3_copy_1;
	$tem['process']=$p3_process_1;
	$tem['browser']=$p3_browser_1;
	
	
		$oRet = DB :: Insert('bav_performance3', $tem);
		
	$tem['type']=2;
	$tem['version']=$p3_version_2;
	$tem['boot']=$p3_boot_2;
	$tem['copy']=$p3_copy_2;
	$tem['process']=$p3_process_2;
	$tem['browser']=$p3_browser_2;
	
	
		$oRet = DB :: Insert('bav_performance3', $tem);
		
		$tem['type']=3;
	$tem['version']=$p3_version_3;
	$tem['boot']=$p3_boot_3;
	$tem['copy']=$p3_copy_3;
	$tem['process']=$p3_process_3;
	$tem['browser']=$p3_browser_3;
	
	
		$oRet = DB :: Insert('bav_performance3', $tem);
	
	

	
	
	
	
	
	
	
	

}

//-------------------------------------------------------



//获得performance下面的第一个表格数据
	static public function getP1($type)
	{
		$options = array ();
		
		$options['select']='*';
		
		$options['order']=' order by time desc';
		
		$options['condition'] = array ('type' => $type);
		
		
		if($type==1)
		$options['size'] = ' 4 ';
		else
		$options['size'] = ' 1 ';
		
		
		$datamodel = DB::LimitQuery('bav_performance1',$options);
		
		return $datamodel;
	
	
	}
//-------------------------------------------------


//更新performance表格上面的数据

static public function setP1($type,$pf_version,$pf_cpu,$pf_memory,$pf_read,$pf_write)
{

$datamodel=array();
	if($type==1)
	{
		$datamodel['type']=1;
		$datamodel['version']=$pf_version;
		$datamodel['cpu']=$pf_cpu;
		$datamodel['memory']=$pf_memory;
		$datamodel['read']=$pf_read;
		$datamodel['write']=$pf_write;
		
		 $options = array ();
		$options['select']='id';
		$options['condition'] = array ('version' => $pf_version);
		$options['one'] = true;
	
		$testmodel = DB :: LimitQuery('bav_performance1', $options);
	
	
	
		if($testmodel)
		{
		$oRet = DB :: Update('bav_performance1', $testmodel['id'],$datamodel,'id');
		return 1;
		}
		
	$oRet = DB :: Insert('bav_performance1', $datamodel);
	
	}
	else
	{
		$datamodel['type']=$type;
		$datamodel['version']=$pf_version;
		$datamodel['cpu']=$pf_cpu;
		$datamodel['memory']=$pf_memory;
		$datamodel['read']=$pf_read;
		$datamodel['write']=$pf_write;
		
		 $options = array ();
		$options['select']='id';
		$options['condition'] = array ('type' => $type);
		$options['one'] = true;
	
		$testmodel = DB :: LimitQuery('bav_performance1', $options);
	
	
	
		if($testmodel)
		{
		$oRet = DB :: Update('bav_performance1', $testmodel['id'],$datamodel,'id');
		return 1;
		}
		
	
	}
	
	 
	
	
   
   
	
	
	
	


}


//--------------------------------------------------------


//获得performance下面的第二个表格数据
	static public function getP2($type)
	{
		$options = array ();
		
		$options['select']='*';
		
		$options['order']=' order by time desc';
		
		$options['condition'] = array ('type' => $type);
		
		
		if($type==1)
		$options['size'] = ' 4 ';
		else
		$options['size'] = ' 1 ';
		
		
		$datamodel = DB::LimitQuery('bav_performance2',$options);
		
		return $datamodel;
	
	
	}
//-------------------------------------------------





//更新performance表格上面的数据

static public function setP2($type,$p2_version,$p2_white,$p2_black,$p2_scan,$p2_clean)
{

$datamodel=array();
	if($type==1)
	{
		$datamodel['type']=1;
		$datamodel['version']=$p2_version;
		$datamodel['white']=$p2_white;
		$datamodel['black']=$p2_black;
		$datamodel['scan']=$p2_scan;
		$datamodel['clean']=$p2_clean;
		
		 $options = array ();
		$options['select']='id';
		$options['condition'] = array ('version' => $p2_version);
		$options['one'] = true;
	
		$testmodel = DB :: LimitQuery('bav_performance2', $options);
	
	
	
		if($testmodel)
		{
		$oRet = DB :: Update('bav_performance2', $testmodel['id'],$datamodel,'id');
		return 1;
		}
		
	$oRet = DB :: Insert('bav_performance2', $datamodel);
	
	}
	else
	{
		$datamodel['type']=$type;
		$datamodel['version']=$p2_version;
		$datamodel['white']=$p2_white;
		$datamodel['black']=$p2_black;
		$datamodel['scan']=$p2_scan;
		$datamodel['clean']=$p2_clean;
		
		 $options = array ();
		$options['select']='id';
		$options['condition'] = array ('type' => $type);
		$options['one'] = true;
	
		$testmodel = DB :: LimitQuery('bav_performance2', $options);
	
	
	
		if($testmodel)
		{
		$oRet = DB :: Update('bav_performance2', $testmodel['id'],$datamodel,'id');
		return 1;
		}
		
	
	}
	
	 
	
	
   
   
	
	
	
	


}


//--------------------------------------------------------


//获得performance下面的子引擎数据
	static public function getEngine($type)
	{
		$options = array ();
		
		$options['select']='*';
		
		$options['order']=' order by time asc';
		
		$options['condition'] = array ('type' => $type);
		
		
		
		
		
		$datamodel = DB::LimitQuery('bav_performance4',$options);
		
		return $datamodel;
	
	
	}
//-------------------------------------------------




//更新performance表格子引擎的数据

static public function setEngine($p4_version,$p4_cpu_1,$p4_cpu_2,$p4_cpu_3,$p4_cpu_4,$p4_cpu_5,$p4_cpu_6,$p4_cpu_7,$p4_pss_1,$p4_pss_2,$p4_pss_3,$p4_pss_4,$p4_pss_5,$p4_pss_6,$p4_pss_7)
{


	
	
		$datamodel=array();
		$datamodel['type']=1;
		$datamodel['version']=$p4_version;
		$datamodel['name']='BavAs';
		$datamodel['cpu']=$p4_cpu_1;
		$datamodel['pss']=$p4_pss_1;
		
		$oRet = DB :: Insert('bav_performance4', $datamodel);
		
		
		
		$datamodel=array();
		$datamodel['type']=2;
		$datamodel['version']=$p4_version;
		$datamodel['name']='BavSk';
		$datamodel['cpu']=$p4_cpu_2;
		$datamodel['pss']=$p4_pss_2;
		
		$oRet = DB :: Insert('bav_performance4', $datamodel);
		
		
		
		$datamodel=array();
		$datamodel['type']=3;
		$datamodel['version']=$p4_version;
		$datamodel['name']='BavDs';
		$datamodel['cpu']=$p4_cpu_3;
		$datamodel['pss']=$p4_pss_3;
		
		$oRet = DB :: Insert('bav_performance4', $datamodel);
		
		
		
		$datamodel=array();
		$datamodel['type']=4;
		$datamodel['version']=$p4_version;
		$datamodel['name']='BavSs';
		$datamodel['cpu']=$p4_cpu_4;
		$datamodel['pss']=$p4_pss_4;
		
		$oRet = DB :: Insert('bav_performance4', $datamodel);
		
		
		
		$datamodel=array();
		$datamodel['type']=5;
		$datamodel['version']=$p4_version;
		$datamodel['name']='BavCs';
		$datamodel['cpu']=$p4_cpu_5;
		$datamodel['pss']=$p4_pss_5;
		
		$oRet = DB :: Insert('bav_performance4', $datamodel);
		
		
		
		$datamodel=array();
		$datamodel['type']=6;
		$datamodel['version']=$p4_version;
		$datamodel['name']='BavVt';
		$datamodel['cpu']=$p4_cpu_6;
		$datamodel['pss']=$p4_pss_6;
		
		$oRet = DB :: Insert('bav_performance4', $datamodel);
		
		
		
		$datamodel=array();
		$datamodel['type']=7;
		$datamodel['version']=$p4_version;
		$datamodel['name']='BavBh';
		$datamodel['cpu']=$p4_cpu_7;
		$datamodel['pss']=$p4_pss_7;
		
		$oRet = DB :: Insert('bav_performance4', $datamodel);
	
	
		
	
	}
	
	 
	
	
   
   
	
	
	
	





//--------------------------------------------------------




}

?>