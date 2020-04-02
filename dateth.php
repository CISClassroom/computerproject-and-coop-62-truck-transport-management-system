<?php
	function MonthThai($date)
	{
		$strMonth= date("n",strtotime($date));
		$strDay= date("j",strtotime($date));
		$strHour= date("H",strtotime($date));
		$strMinute= date("i",strtotime($date));
		$strSeconds= date("s",strtotime($date));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return " $strMonthThai";
	}
	
	function YearThai($date)
	{
		$strYear = date("Y",strtotime($date))+543;
		return "$strYear";
	}


?>    