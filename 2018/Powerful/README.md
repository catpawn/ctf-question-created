# Powerful #

## Equation ##
![eq](https://latex.codecogs.com/gif.latex?enc%3Dflag%5E%7B_%7B1337%7D%7D)


## Intended Solution ##
[solve.py](https://github.com/catpawn/ctf-question-created/tree/master/2018/Powerful/solve.py)
```python
import gmpy2

enc = open("./flag.enc","rb").read()
gmpy2.get_context().precision=100
print hex(gmpy2.iroot(int(enc), 1337)[0])[2:].decode('hex')
```