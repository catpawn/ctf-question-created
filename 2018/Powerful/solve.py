import gmpy2

enc = open("./flag.enc","rb").read()
gmpy2.get_context().precision=100
print hex(gmpy2.iroot(int(enc), 1337)[0])[2:].decode('hex')