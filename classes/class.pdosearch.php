<?php

include "classes/class.PdoConnect.php";

class PdoSearch extends PdoConnect
{
	protected $langid;
	
	public function setLangid($langid)
	{
		$this->langid = $langid;
	}
	
	public function search($params)
	{
		
		$keyword=htmlentities($params['keyword'], ENT_QUOTES);
		$this->langid = $params['lang'];
		
		switch($params['lang'])
		{
		case "":
			$ssql = "";
			break;
		default:
			$ssql = " and lang_id=".$params['lang'];
			break;
		}
		
		switch($params['spec'])
		{
		case "":
			$ssql .= "";
			break;
		default:
			$ssql .= " and sp_id=".$params['spec'];
			break;
		}
		
		switch($params['type'])
		{
		case 'code':
			$sql = "select * from codes where code like '%$keyword%'";
			break;
		case 'descrip':
			$sql = "select * from codes where description like '%$keyword%'";
			break;
		default:
			$sql = "select * from codes where code like '%$keyword%'";
			break;
		}
		
		$esql = " order by linenum";
		
		$sql = $sql.$ssql.$esql;
		//echo $sql;
		$this->squery($sql);
	}
	
	public function squery($sql)
	{
		$sth = $this->pdo->prepare($sql);
		$res = $sth->execute();
		
		$res = $sth->fetchAll();
		
		include "includes/vars.php";
		//print_r($res);
		
		$lang = $langs[$this->langid][1];
		echo $lang;
		$this->switchBrush($lang);
		
		foreach($res as $row)
		{
			
			echo "<div class=code>";
			$this->getTags($row['id']);
			echo "<h3><a href='code.php?id=".$row['id']."&ld=".$this->langid."'>".$row['id']."</a> ";
			echo $row['modified']."</h3><br>";
			echo "<pre class='brush: ".$langs[$row['lang_id']][1]."'>\n";
			echo $row['code'];
			echo "</pre>";
			
			echo "<div class=description>";
			echo $row['description'];
			echo "</div>";
			echo "</div>";
		}
		
		
	}
	
	public function switchBrush($lang)
	{
		switch($lang)
		{
			case 'php':
				echo '<script type="text/javascript" src="sh/scripts/shBrushPhp.js"></script> ';
				break;
			case '':
				break;
		}
	}
	
	public function getTags($codeid)
	{
		//select sp_id, speciality from code_specs inner join specialities where sp_id=specialities.id and code_id=35
		$sql="select sp_id, speciality from code_specs innser join specialities where sp_id=specialities.id and code_id=$codeid";
		$sth = $this->pdo->prepare($sql);
		$sth->execute();
		$res = $sth->fetchAll();
		$specsv="";
		$tagdisp="";
		foreach($res as $row)
		{
			$specs[] = array($row['sp_id'],$row['speciality']);
			$tagdisp .= "<a href='tag.php?tid=".$row['sp_id']."' class=tag>".$row['speciality']."</a> ";
		}
		
			echo $tagdisp."<br>";
		
	}
}