<?php
class JSONHelper{
	private static $obfuscator='<?php die() ?>';
	
	static function write($file,$data,$assoc=false,$overwrite=false){
		if(!isset($data)) return false;
		$rows=[];
		if(!$overwrite && file_exists($file)) $rows=json_decode(strtolower(PATHINFO($file)['extension'])=='php' ? trim(preg_replace('/^'.preg_quote(self::$obfuscator).'/','',file_get_contents($file))) : file_get_contents($file),true);
		if(json_last_error()!=JSON_ERROR_NONE){
			self::reset($file);
			return false;
		}
		if(!$assoc){
			if(isset($data[0])) foreach($data as $row) $rows[]=$row;
			else $rows[]=$data;
		}else foreach($data as $k=>$v) $rows[$k]=$v;
		$h=fopen($file,'w+');
		if(!flock($h,LOCK_EX|LOCK_NB)) return false;
		if(strtolower(PATHINFO($file)['extension'])=='php') fwrite($h,self::$obfuscator."\n");
		fwrite($h,json_encode($rows));
		fclose($h);
		return true;
	}

	static function read($file,$offset=null,$limit=null,$skipblanks=false){
		if(!file_exists($file)) return [];
		if(!isset(PATHINFO($file)['extension'])) return [];
		$rows=json_decode(strtolower(PATHINFO($file)['extension'])=='php' ? trim(str_replace(self::$obfuscator,'',file_get_contents($file))) : file_get_contents($file),true);
		if(json_last_error()!=JSON_ERROR_NONE){
			self::reset($file);
			return [];
		}
		if(!isset($offset)) return $rows;
		$count=0;
		$started=false;
		$out=[];
		$is_assoc=self::is_assoc($rows);
		//TODO: rad associative array as numeric offset 
		foreach($rows as $k=>$v){
			if($k==$offset) $started=true;
			if($started){
				$out[$k]=$v;
				$count++;
				if($count==$limit) break;
			}
		}
		return $out;
	}

	static function find($file,$filter,$limit=null){
		if(!file_exists($file)) return [];
		$records=self::read($file);
		$count=0;
		$out=[];
		foreach($records as $record){
			if(is_array($filter)){
				$found=true;
				foreach($filter as $k=>$v) if(!isset($record[$k]) || $record[$k]!=$v) $found=false;
				if($found) $out[$count]=$record;
			}else foreach($record as $k=>$v) if($v==$filter) $out[$count]=$record;
			$count++;
		}
		return $out;
	}

	static function modify($file,$index,$data,$overwrite=true){
		if(!file_exists($file) || !isset($data) || !isset($index)) return false;
		$rows=json_decode(strtolower(PATHINFO($file)['extension'])=='php' ? trim(preg_replace('/^'.preg_quote(self::$obfuscator).'/','',file_get_contents($file))) : file_get_contents($file),true);
		if(json_last_error()!=JSON_ERROR_NONE){
			self::reset($file);
			return false;
		}
		if(!isset($rows[$index])) return false;
		$rows[$index]=$overwrite ? $data : array_merge($rows[$index],$data);
		if(!flock($h=fopen($file,'w+'),LOCK_EX|LOCK_NB)) return false;
		if(strtolower(PATHINFO($file)['extension'])=='php') fwrite($h,self::$obfuscator."\n");
		fwrite($h,json_encode($rows));
		fclose($h);
		return true;
	}

	static function delete($file,$index=null,$assoc=false,$wipe=false){
		if(!file_exists($file)) return false;
		if(!isset($index)) return unlink($file);
		$rows=json_decode(strtolower(PATHINFO($file)['extension'])=='php' ? trim(preg_replace('/^'.preg_quote(self::$obfuscator).'/','',file_get_contents($file))) : file_get_contents($file),true);
		if(json_last_error()!=JSON_ERROR_NONE){
			self::reset($file);
			return false;
		}
		if(is_array($index)){
			foreach($index as $i){
				if($wipe) unset($rows[$i]); 
				else $rows[$i]=[null];
			}
		}else{
			if($wipe) unset($rows[$index]);
			else $rows[$index]=[null];
		}
		if(!$assoc) $rows=array_values($rows);
		if(!flock($h=fopen($file,'w+'),LOCK_EX|LOCK_NB)) return false;
		if(strtolower(PATHINFO($file)['extension'])=='php') fwrite($h,self::$obfuscator."\n");
		fwrite($h,str_replace('[null]','{}',json_encode($rows)));
		fclose($h);
		return true;
	}
	
	private static function is_assoc($array){
		$keys=array_keys($array);
		return $keys!==array_keys($keys);
	}
	
	private static function reset($file){
		if(file_exists($file)) rename($file,str_replace('.json','_backup_'.date('Y-m-d_h_i_s').'.json',$file));
	}
}