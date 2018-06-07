import requests
import string

secret =''
dictW = "_0123456789{}abcdefghijklmnopqrstuvwxyz"
while True:
	payload = "a" * (15 - len(secret)%16)
	r = requests.post("http://61.93.159.186/ctf/", data={'username':'','password': payload})
	orgData = r.text[r.text.find("</h4><br/>"):r.text.find("<br/>		</div>")]
	orgData = orgData.replace("</h4><br/>","").replace("<br/>		</div>","")

	for s in dictW:
		print "[Trying] " + s
		payload = "a" * (15 - len(secret)%16)
		r = requests.post("http://61.93.159.186/ctf/", data={'username':'','password': payload+secret+s})
		data = r.text[r.text.find("</h4><br/>"):r.text.find("<br/>		</div>")]
		data = data.replace("</h4><br/>","").replace("<br/>		</div>","")

		if len(secret) < 32:
			buf = 0
		else:
			buf = 32

		if data[buf:buf+32 + 16*(len(secret)/16)] == orgData[buf:buf+32+16*(len(secret)/16)]:
			secret = secret + s
			print secret
			break
