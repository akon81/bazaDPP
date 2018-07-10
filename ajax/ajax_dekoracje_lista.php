<?php
  require_once("../funkcje_glowne_strony.php");
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Easy set variables
	 */
	
	/* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */
	$aColumns = array('indeks', 'number_full', 'date', 'path', 'name', 'descript', 'tags', 'canvassing', 'production', 'etc_canvassing', 'customer', 'id', 'year', 'kind', 'canvassing', 'production', 'etc_canvassing', 'count');
	
	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "id";
	
	/* DB table to use */
	$sTable = "v_prev_decor";
	
	/* Database connection information */
	
	$gaSql['user']       = Config::get("DB_USER");
	$gaSql['password']   = Config::get("DB_PASS");
	$gaSql['db']         = Config::get("DB_NAME");
	$gaSql['server']     = Config::get("DB_HOST");
	
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
	 * no need to edit below this line
	 */
	
	/* 
	 * MySQL connection
	 */
	$gaSql['link'] =  mysql_pconnect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
		die( 'Could not open connection to server' );
	mysql_query("SET CHARACTER SET utf8");
	
	mysql_select_db( $gaSql['db'], $gaSql['link'] ) or 
		die( 'Could not select database '. $gaSql['db'] );
	
	
	/* 
	 * Paging
	 */
	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
		$sLimit = "LIMIT ".mysql_real_escape_string( $_GET['iDisplayStart'] ).", ".
			mysql_real_escape_string( $_GET['iDisplayLength'] );
	}
	
	
	/*
	 * Ordering
	 */
	$sOrder = "";
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
		{
			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
			{
				$sOrder .= "`".$aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."` ".
				 	mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
			}
		}
		
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}
	}
	
	/* 
	 * Filtering
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */
	$sWhere = "";
	if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
	{
		$se=$_GET['sSearch']; $se=str_replace(" ","%",$se);
		$sWhere = "WHERE (";
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
		$sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $se )."%' OR ";
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}
	
	/* Individual column filtering */
	for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
		if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= "`".$aColumns[$i]."` = '".mysql_real_escape_string($_GET['sSearch_'.$i])."'";
		}
	}

	/*
	 * SQL queries
	 * Get data to display
	 */
	$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
		FROM   $sTable
		$sWhere
		$sOrder
		$sLimit
		";
	$rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	
	/* Data set length after filtering */
	$sQuery = "
		SELECT FOUND_ROWS()
	";
	$rResultFilterTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
	$iFilteredTotal = $aResultFilterTotal[0];
	
	/* Total data set length */
	$sQuery = "
		SELECT COUNT(`".$sIndexColumn."`)
		FROM   $sTable
	";
	$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$aResultTotal = mysql_fetch_array($rResultTotal);
	$iTotal = $aResultTotal[0];
	
	
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	
		while ( $aRow = mysql_fetch_array( $rResult ) )
	{
		$row = array();
		$data=new DateTime();
		$rand=$data->format("i:s");
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{			
			if ($i==3) {
				if($aRow[ $aColumns[17]]==0) $row[]='brak dodanego obrazka'; else 
				$row[]="<div class='lbox'><div class='count' title='ilość wszystkich obrazków'>".$aRow[ $aColumns[17] ]."</div><a class='lbox1' href='pliki/upload/".$aRow[ $aColumns[$i] ]."' data-lightbox='L".$aRow[ $aColumns[11] ]."' data-title='".$aRow[ $aColumns[0] ]."'><img src='pliki/upload/thumbs/".$aRow[ $aColumns[$i] ].'?'.$rand."' width='300'/></a><span style='display:none;'>".$aRow[ $aColumns[11] ]."</span></div>"; } else
			if ($i==7) {if($aRow[ $aColumns[7]]==1) $row[]="<span class='text-blue'><i class='fa fa-check'></i> tak</span>"; else $row[]="<span class='text-red'><i class='fa fa-ban'></i> nie</span>"; } else
			if ($i==8) {if($aRow[ $aColumns[8]]==1) $row[]="<span class='text-green'><i class='fa fa-check'></i> tak</span>"; else $row[]="<span class='text-red'><i class='fa fa-ban'></i> nie</span>"; } else
			if ($i==9) {if($aRow[ $aColumns[9]]==1) $row[]="<span class='text-sea'><i class='fa fa-check'></i> tak</span>"; else $row[]="<span class='text-red'><i class='fa fa-ban'></i> nie</span>"; } else
			if ($i==17) $row[]=''; else	
			if ( $aColumns[$i] == $sIndexColumn )
			{
				/* Special output formatting for 'version' column */
			//		
			if ($i==11) $row[]="<a class='btn pencil' title='szczegóły / edytuj'><span style='display:none;'>".$aRow[ $aColumns[$i] ]."</span></a> <a class='btn trash' title='usuń z bazy danych'></a>"; 
			else $row[] = $aRow[ $aColumns[$i] ];
				//$row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
			}
			else if ( $aColumns[$i] != ' ' )
			{
				/* General output */
				$row[] = $aRow[ $aColumns[$i] ];
			}
		}
		$output['aaData'][] = $row; 
	}
	
	echo json_encode( $output );
?>