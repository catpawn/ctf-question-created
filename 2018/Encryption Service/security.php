<?php
class Security {
	
	private $key = null;
	private $signKey = null;

	public function __construct($key = null, $signKey = null) {
		
		if(is_null($key)) {
			throw new \Exception('set sccret key please.');
		}
		if(is_null($signKey)) {
			throw new \Exception('set sign key please.');
		}
		$this->key = $key;
		$this->signKey = $signKey;
		
	}
	 
	public function sign($content) {
		
		return strtoupper(hash_hmac('sha256', $content, $this->signKey));
		
	}
	
	public function verify($content, $sign) {
		
		if($sign == $this->sign($content)) {
			return true;
		}
		return false;
		
	}

	public function AesEcbEncrypt($input) {
		
		$size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
		$input = $this->pkcs5_pad($input, $size);
		$td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');
		$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
		mcrypt_generic_init($td, $this->key, $iv);
		$data = mcrypt_generic($td, $input);
		mcrypt_generic_deinit($td);
		mcrypt_module_close($td);
		$data = bin2hex($data);
		return $data;
		
	}

	private function pkcs5_pad($text, $blocksize) {
		
		$pad = $blocksize - (strlen($text) % $blocksize);
		return $text . str_repeat(chr($pad), $pad);
		
	}

	public function decrypt($sStr) {
		$decrypted= mcrypt_decrypt(MCRYPT_RIJNDAEL_128,$this->key,hex2bin($sStr), MCRYPT_MODE_ECB);
		$dec_s = strlen($decrypted);
		$padding = ord($decrypted[$dec_s-1]);
		$decrypted = substr($decrypted, 0, -$padding);
		return $decrypted;
	}

    private function createLinkString($para, $encode) {
		
    	ksort($para);
    	$linkString = "";
    	while ( list ( $key, $value ) = each ( $para ) ) {
    		if ($encode) {
    			$value = urlencode ( $value );
    		}
    		$linkString .= $key . "=" . $value . "&";
    	}
    	$linkString = substr ( $linkString, 0, count ( $linkString ) - 2 );
    	return $linkString;
		
    }
}
?>