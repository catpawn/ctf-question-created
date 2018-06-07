flag = "***DELETED***"
def myHash(text):
	open("flag.enc","wb").write(str(pow(int(flag.encode('hex'),16),1337)))

myHash(flag)