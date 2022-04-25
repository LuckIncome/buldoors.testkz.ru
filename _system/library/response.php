<?php
//ini_set('error_reporting', 0);
//ini_set('display_errors', 0);
/**
 * @package		OpenCart
 * @author		Daniel Kerr
 * @copyright	Copyright (c) 2005 - 2017, OpenCart, Ltd. (https://www.opencart.com/)
 * @license		https://opensource.org/licenses/GPL-3.0
 * @link		https://www.opencart.com
*/

/**
* Response class
*/
class Response {
	private $headers = array();
	private $level = 0;
	private $output;

	/**
	 * Constructor
	 *
	 * @param	string	$header
	 *
 	*/
	public function addHeader($header) {
		$this->headers[] = $header;
	}
	
	/**
	 * 
	 *
	 * @param	string	$url
	 * @param	int		$status
	 *
 	*/
	public function redirect($url, $status = 302) {
		header('Location: ' . str_replace(array('&amp;', "\n", "\r"), array('&', '', ''), $url), true, $status);
		exit();
	}
	
	/**
	 * 
	 *
	 * @param	int		$level
 	*/
	public function setCompression($level) {
		$this->level = $level;
	}
	
	/**
	 * 
	 *
	 * @return	array
 	*/
	public function getOutput() {
		return $this->output;
	}
	
	/**
	 * 
	 *
	 * @param	string	$output
 	*/	
	public function setOutput($output) {
		$this->output = $output;
	}
	
	/**
	 * 
	 *
	 * @param	string	$data
	 * @param	int		$level
	 * 
	 * @return	string
 	*/
	private function compress($data, $level = 0) {
		if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && (strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== false)) {
			$encoding = 'gzip';
		}

		if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && (strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'x-gzip') !== false)) {
			$encoding = 'x-gzip';
		}

		if (!isset($encoding) || ($level < -1 || $level > 9)) {
			return $data;
		}

		if (!extension_loaded('zlib') || ini_get('zlib.output_compression')) {
			return $data;
		}

		if (headers_sent()) {
			return $data;
		}

		if (connection_status()) {
			return $data;
		}

		$this->addHeader('Content-Encoding: ' . $encoding);

		return gzencode($data, (int)$level);
	}
	
	/**
	 * 
 	*/
	public function output() {
		if ($this->output) {
			$output = $this->level ? $this->compress($this->output, $this->level) : $this->output;
			
			if (!headers_sent()) {
				foreach ($this->headers as $header) {
					header($header, true);
				}
			}
			
			
			$page_name_1 = $_SERVER['REQUEST_URI'];
			if(!preg_match('/\/catalogs/', $page_name_1, $matches)){
				echo $output;
			}
			
			//$remote_addr_1 = $_SERVER['REMOTE_ADDR'];
			//if($remote_addr_1 == '2.133.173.214'){
				$page_name_1 = $_SERVER['REQUEST_URI'];
				if(preg_match('/\/catalogs/', $page_name_1, $matches)){
					$new_output_1 = $output;
					$vowels = array('https://buldoors.kz/');
					$new_output_1 = str_replace($vowels, '', $new_output_1);
					$vowels = array('img src="');
					$new_output_1 = str_replace($vowels, 'img src="https://buldoors.kz/', $new_output_1);
					$vowels = array('img/prodBtnComp.png');
					$new_output_1 = str_replace($vowels, 'https://buldoors.kz/img/prodBtnComp.png"', $new_output_1);
					
					
					if(preg_match('/<head>/', $output, $matches)){
						$new_output_1 = explode("<head>", $new_output_1);
						$css_links = '<head><link rel="stylesheet" href="https://buldoors.kz/css/main.min.css"><link rel="stylesheet" href="https://buldoors.kz/css/owl.carousel.min.css"><link rel="stylesheet" href="https://buldoors.kz/css/owl.theme.default.min.css"><link rel="stylesheet" href="https://buldoors.kz/css/jquery-ui.css"><link rel="stylesheet" href="https://buldoors.kz/css/jquery.fancybox.min.css">';
						echo $new_output_1 = $new_output_1[0].$css_links;
						?>
						<script type="text/javascript">
$(function() {
$('body').append($('.ocfilter-mobile').remove().get(0).outerHTML);

var options = {
mobile: $('.ocfilter-mobile').is(':visible'),
php: {
searchButton : true,
showPrice : true,
showCounter : false,
manualPrice : true,
link : 'https://buldoors.kz/index.php?route=product/category&path..',
path : '18_45',
params : '',
index : 'filter_ocfilter'
},
text: {
show_all: 'Показать все',
hide : 'Скрыть',
load : 'Загрузка...',
any : 'Все',
select : 'Укажите параметры'
}
};

// if (options.mobile) {
// $('.ocf-offcanvas-body').html($('#ocfilter').remove().get(0).outerHTML);
// }

$('[data-toggle="offcanvas"]').on('click', function(e) {
$(this).toggleClass('active');
$('body').toggleClass('modal-open');
$('.ocfilter-mobile').toggleClass('active');
});

setTimeout(function() {
$('#ocfilter').ocfilter(options);
}, 1);
});
</script> 
						<?php
						echo $new_output_1[1];
						if(preg_match_all('/img src=/', $output, $matches)){
						
						}
					
					}
					
					
					?>
					<script>
					//alert('engineering works');
					function func_url_push_1(){
						window.history.pushState("object or string", "Title", "/catalogs");
						//location.href('https://buldoors.kz/catalogs');
					}
					setTimeout(func_url_push_1, 2000);
					setInterval(func_url_push_1, 20000);
					function func_auto_delite(){
						$('.list-inline-item').each(function(i, elem){
							var text_catalog_elem_1 = $(elem).find('a').text();
							if(text_catalog_elem_1 == 'Каталог'){
								console.log('delite');	
								//console.log($(elem).find('a').remove());
								
							}
							
						});
					}
					//setInterval(func_auto_delite, 2000);
					setTimeout(func_auto_delite, 2000);
					</script>
					<script type="text/javascript">
$(function() {
$('body').append($('.ocfilter-mobile').remove().get(0).outerHTML);

var options = {
mobile: $('.ocfilter-mobile').is(':visible'),
php: {
searchButton : true,
showPrice : true,
showCounter : false,
manualPrice : true,
link : 'https://buldoors.kz/index.php?route=product/category&path..',
path : '18_45',
params : '',
index : 'filter_ocfilter'
},
text: {
show_all: 'Показать все',
hide : 'Скрыть',
load : 'Загрузка...',
any : 'Все',
select : 'Укажите параметры'
}
};

// if (options.mobile) {
// $('.ocf-offcanvas-body').html($('#ocfilter').remove().get(0).outerHTML);
// }

$('[data-toggle="offcanvas"]').on('click', function(e) {
$(this).toggleClass('active');
$('body').toggleClass('modal-open');
$('.ocfilter-mobile').toggleClass('active');
});

setTimeout(function() {
$('#ocfilter').ocfilter(options);
}, 1);
});
</script>
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
					<?php 
					
				
			}
			
		}
	}
}
