<?php
	class myupfile
	{
		function upfile($name,$tmp_name,$folder)
		{
			if($name!='')
			{
				$newname = $folder."/".$name;
				if(move_uploaded_file($tmp_name,$newname))
				{
				 return 1;	
				}
				return 0;	
			}
				
		}	
		
	}
?>