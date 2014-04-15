<?php

/*
|----------------------------------------------------------------------
| LOAD PATH ANALYZE
|----------------------------------------------------------------------
|About this class job is let folder path join in current
|search path and return a new object. 	
*/


class LoadPath
{
	public static function analyze($type, $path)
	{ 
		if (empty($path) OR empty($type)):
			Error::showError(__class__, __function__, 'You should input the class(file) name and folder name of load. for example: folder path/file name');
		else:
			$load = explode(PATHSLASH , $path);

			//If file is in same path of folder
			if (count($load) == 1):
				$fileName = $load[0];
				if (file_exists(ROOTPATH . PATHSLASH . $type . PATHSLASH . $fileName . '.php')):
					return $fileName;
				else:
					Error::showError(__class__, __function__, 'Can not find the name of file of '. $fileName);
				endif;
			else:
				$fileName = array_pop($load);
				$loadPath = join(PATHSLASH , $load);
				$searchPath = ROOTPATH . PATHSLASH . $type . PATHSLASH . $loadPath;

				if (is_dir($searchPath)):
					//If path of load not in current search path so join it in current path.
					if ( ! in_array($searchPath, explode(PATH_SEPARATOR, get_include_path()))):
						set_include_path($searchPath . PATH_SEPARATOR . get_include_path());
					endif;
				endif;

				if (file_exists($searchPath . PATHSLASH . $fileName . '.php')):
					return $fileName;
				else:
					Error::showError(__class__, __function__, 'Can not find the name of file of '. $fileName);
				endif;
			endif;
		endif;
	}
}