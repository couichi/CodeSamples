//A feeble attempt to impliment a tag suggestion feature by myself.
//it worked once but never completely,
//I'll replace this with some tested library
//when I find a time, later on, that is.


$(document).ready(function() {
	lang_name = "";
	$("#lang").change(function(){
		var lang = $(this).val();
		$.post(
		"get_tags.php", 
		{ Lang: $(this).val() },
		function(json){ lang_name = eval(json);}
		);
	});

	
	$("#tag").keyup(function(){
		
		var taginp = $(this).val();
		
		if(taginp.match(","))
		{
			
			var mt = taginp.match(",.?$");
			mt = String(mt);
			mt = mt.substring(1);
			taginp = mt;
			//alert(mt);
			
		}
		
		//alert(lang_name);
		if(taginp=="" || taginp=="Libraries/Implementations/Softwares")
		{
			$("#taglist").html("");
		}
		else
		{
			filterSpec(taginp);
		}
		
	});
	
	
	
});

function clickTag(a)
{
	var stname = $(a).text();
	var otag = $("#tag").val();
	if(otag=="" || otag=="Libraries/Implementations/Softwares")
	{
		$("#tag").val(stname+",");
	}
	else
	{
		
		var valid_tags = "";
		if(!otag.match(","))
		{
			
			valid_tags = stname + ",";
			$("#tag").val(valid_tags);
		}
		else
		{
		
		
		var otags = otag.split(",");
		jQuery.each(otags, function(){
			
			if($.inArray(String(this),lang_name)==-1)
			{//not a tag
				//alert(jQuery.inArray(String(this),lang_name));
			}
			else
			{//it is a tags
			//alert(this);
				valid_tags += this + ",";
			}
		});
		
		valid_tags += stname + ",";
		$("#tag").val(valid_tags);
				}
		
	}
	//$("#tag").val(stname+",");
}

function filterSpec(tag)
{
	var pat = RegExp("^"+tag,"i");
	temps = new Array();
	for(var i=0; i<lang_name.length; i++)
	{
		if(lang_name[i].match(pat))
		{
			
			temps.push(lang_name[i]);
			//alert(temps[0]);
		}
	}
	//lang_name = new array();
	//lang_name = temps;
	//alert(lang_name[0]);

	dispTags();
}

function dispTags()
{
	$("#taglist").html(loopTags());
}

function loopTags()
{
	//alert(temps);
	var disp = "";
	for(var j=0; j<temps.length; j++)
	{
		disp += "<span id=stag class=stag onclick='clickTag(this)';>" + temps[j] + "</span> ";
		//disp += temps[j]+" ";
	}
	return disp;
}


/*
	insert into lang_specs(lang_id,sp_id) values(47,16);
	
	1.get selected languange
	2.send lang_id
	3.select data
	4.get data
	5.store data
	6.wait input
	7.narrow down tags by input
	6.display data

popup selected text 
var lang = $("#lang option:selected").text();

popup selected value
var lang = $(this).val();
	
*/