<?php


class Validation
{
	protected $boolean = array();
	public $exlen;
	
	public function checkBlank($array,$emp_ok)
	{
		$err = array();
		foreach($array as $key => $val)
		{
			if(empty($val))
			{
				if($emp_ok=="")
				{
				$err[] = "$key is empty!";
				}
				else
				{
					if(in_array($key,$emp_ok))
					{
						
					}
					else
					{
						$err[] = "$key is empty!";
					}
				}
			}
		}
		return $err;
	}
	
	public function getLines($code)
	{
		$lines = explode("\n",$code);
		$ln= count($lines);
		return $ln;

	}
	
	public function checkCode($code)
	{//80 length x 40 lines
		$lines = explode("\n",$code);
		if(count($lines)>40)
		{
			$this->boolean[] = -1;
			return $this;
		}
		else
		{
			foreach($lines as $val)
			{
				if(strlen($val)>80)
				{
					$this->boolean[] = -1;
					$this->exlen = strlen($val);
					echo $this->exlen;
					echo "$val is too long!<br>";
					echo "It should be less than 80 characters long!";
					return $this;
				}
			}
			
			$this->boolean[] = 0;
			return $this;
		}
	}
	
	public function checkTag($post)
	{
		if($post=="Libraries/Implementations/Softwares")
		{
			//echo "err";
			$this->boolean[] = 0;
			return $this;
		}
		
		$tags = explode(",",$post);
		foreach($tags as $tag)
		{
			if(strlen($tag)>64)
			{
			$this->boolean[] = -1;
			return $this;
			}
			elseif(!preg_match('/^[A-Za-z0-9-_\s]+$/', $tag))
			{
			$this->boolean[] = -1;
			return $this;
			}
		}
		
			$this->boolean[] = 0;
			return $this;

		
	}
	
	public function checkLang($lang)
	{
		if($lang<0 || $lang>52)
		{
			$this->boolean[] = -1;
			return $this;
		}
		else
		{
			$this->boolean[] = 0;
			return $this;
		}

	}
	
	public function checkDescription($description)
	{
		
		$this->boolean[]=0;
		return $this;

	}
	
	public function checkErrors()
	{
		if(array_sum($this->boolean)<0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	
}