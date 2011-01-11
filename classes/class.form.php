<?php

class Form
{
	
	public function Form($method,$action)
	{
		echo "<form method=$method action=$action>";
	}
	
	public function endForm()
	{
		echo "<input type=submit>";
		echo "</form>";
	}
	
	public function langSelect($selected)
	{
		if(isset($selected))
		{
			$s[$selected]="selected";
		}

		echo "
	<select name=\"lang\" id=\"lang\">
	<option value=''> Language</option> 
<option value='1' $s[1]>ActionScript 3</option> 
<option value='2' $s[2]>Ada</option> 
<option value='3' $s[3]>APL/J/K</option> 
<option value='4' $s[4]>Assembly language</option> 
<option value='5' $s[5]>AWK</option> 
<option value='6' $s[6]>Batch script</option> 
<option value='7' $s[7]>C</option> 
<option value='8' $s[8]>C#</option> 
<option value='9' $s[9]>C++</option> 
<option value='10' $s[10]>Clojure</option> 
<option value='11' $s[11]>COBOL</option> 
<option value='12' $s[12]>CSS</option> 
<option value='13' $s[13]>D</option> 
<option value='14' $s[14]>Delphi</option> 
<option value='15' $s[15]>Eiffel</option> 
<option value='16' $s[16]>Erlang</option> 
<option value='17' $s[17]>F#</option> 
<option value='18' $s[18]>Forth</option> 
<option value='19' $s[19]>Fortran</option> 
<option value='20' $s[20]>Go</option> 
<option value='21' $s[21]>Groovy</option> 
<option value='22' $s[22]>Haskell</option> 
<option value='23' $s[23]>Java</option> 
<option value='24' $s[24]>JavaScript</option> 
<option value='25' $s[25]>JScript</option> 
<option value='26' $s[26]>LaTeX</option> 
<option value='27' $s[27]>Lisp</option> 
<option value='28' $s[28]>Lua</option> 
<option value='29' $s[29]>ML</option> 
<option value='30' $s[30]>Objective-C</option> 
<option value='31' $s[31]>Ocaml</option> 
<option value='32' $s[32]>Octave</option> 
<option value='33' $s[33]>Pascal</option> 
<option value='34' $s[34]>Perl</option> 
<option value='35' $s[35]>PHP</option> 
<option value='36' $s[36]>PowerShell</option> 
<option value='37' $s[37]>Processing</option> 
<option value='38' $s[38]>Prolog</option> 
<option value='39' $s[39]>Python</option> 
<option value='40' $s[40]>R</option> 
<option value='41' $s[41]>Ruby</option> 
<option value='42' $s[42]>Scala</option> 
<option value='43' $s[43]>Scheme</option> 
<option value='44' $s[44]>Scilab</option> 
<option value='45' $s[45]>Script-fu</option> 
<option value='46' $s[46]>Smalltalk</option> 
<option value='47' $s[47]>SQL</option> 
<option value='48' $s[48]>Squeak</option> 
<option value='49' $s[49]>Unix shell</option> 
<option value='50' $s[50]>VBA</option> 
<option value='51' $s[51]>VBscript</option> 
<option value='52' $s[52]>Visual Basic</option> 
	</select>
	";
	}
	
	public function specSelect($selected)
	{
		if(isset($selected))
		{
			$s[$selected]="selected";
		}
		
		echo "
			<select name=\"spec\">
			<option value=''>Lib/Imp/Software</option> 
			<option value='1' $s[1]>Default</option> 
			<option value='2' $s[2]>MASM</option> 
			<option value='3' $s[3]>NASM</option> 
			<option value='4' $s[4]>TASM</option> 
			<option value='5' $s[5]>jQuery</option> 
			<option value='6' $s[6]>ZendFramework</option> 
			<option value='7' $s[7]>Cakephp</option> 
			<option value='8' $s[8]>Rails</option> 
			<option value='9' $s[9]>Gimp</option> 
			<option value='10' $s[10]>Gauche</option> 
			</select>
			";
	}
	
	public function tag($tag)
	{
		echo "<input type=text name=tag id=tag value='$tag' title='Libraries/Softwares...' size=30 autocomplete='off'>";
	}
	
	public function newTag()
	{
		echo "<input type=text name=newtag id=tag value='' title='Libraries/Softwares...' size=30>";
	}
	
	public function codeArea($code)
	{
		echo "<textarea name=code id=code rows=40 cols=80 width=80 height=40 title='paste your code here'>";
		echo $code;
		echo "</textarea>";
	}
	
		public function descriptionArea($description)
	{
		echo "<textarea name=description id=description rows=10 cols=80 width=80 height=40 title='describe the above code'>";
		echo $description;
		echo "</textarea>";
	}
	
}