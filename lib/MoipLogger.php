<?php
	
	/**
   * @author Aires Gonçalves <airesvsg@gmail.com>
   */
	
  class MoipLogger {

    private static $filename;
    private	static $handle;
    private static $lineBreak = "\r\n";

		public static function open($filename, $mode='a'){
			if($filename){
				self::$filename = $filename;
				self::$handle   = fopen($filename, $mode);
				return new self;
			}
			return false;
		}

		public static function write($data, $filename=null){
			self::$filename = $filename ? $filename : self::$filename;
			if(!self::$handle)
				self::open(self::$filename);
			$log = "***********************************************" . self::$lineBreak;
			$log .= date("Y-m-d H:i:s:u (T)") . self::$lineBreak;
			$log .= "File: " . $_SERVER["REQUEST_URI"] . self::$lineBreak; 
			$log .= $data . self::$lineBreak . self::$lineBreak;
			return fwrite(self::$handle, $log);
		}

		public static function read($filename=null){
			$content = '';
			self::$filename = $filename ? $filename : self::$filename;
			self::open(self::$filename, 'r');
			if(filesize(self::$filename))
				$content = fread(self::$handle, filesize(self::$filename));
			self::close();
			return $content;
		}

		public static function close(){
			return self::$handle ? fclose(self::$handle) : false;
    }

	}
