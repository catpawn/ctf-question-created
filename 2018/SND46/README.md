# SND46 #

## Intended Solution ##
1. You will find many dns record inside the pcapng file

2. Extract all out
[solve.py](https://github.com/catpawn/ctf-question-created/tree/master/2018/SND46/solve.py)

```python
from scapy.all import rdpcap, DNSQR, DNSRR

output = ""
for p in rdpcap('Misc150.pcapng'):
	if p.haslayer(DNSQR) and not p.haslayer(DNSRR):
		qry = p[DNSQR].qname.replace('.blacktr.org', '').split('.')
		output = output + qry[0]
print output

```

3. You will get
```
ysrT3m1i6z5gLn1c941iMy0iwi0ivsre6z5g32xVLy0ivsxV8WVmM2wVvTBW8WHd6z5gLy0ivsNf72ll7WVk=y0ivsHW6z5gM2pk341j32rj9C0ivsNf7KBl9s1i6z5g846fMn6R72lV8XvVvTBR7WwVvTBj=KNkM2lj6z5gMs1j329eMK6j6z6D6z5g32oVvTBk3s0VvTAhOzLg8i0ivsri7n1eMC0iv4xYMy0ivqlR8nNRLmRl8m1k94vVvTB67XNk3Kxl9s0VvTBfMS0ivrxVLmRe7mhfMnUVvT9j6z5g6z5oz0V06z5n8i0iOy0ivrxVLmQVvTBN7mxV7C0ivr6R32hi7mrU6z5gwmhlLS0ivC0iOrxN0UvVvTUVN05h6z1q6z5gL2pU6z5gz0V06z5gwK6k32MZLmVR7C0ivqVe9s1c7sVXM2pTMy0ivqhRLWHiLKxf8XUe6z1CvS0lxC0ivrxYMy0ivsRfLW6p3KNk6z5g3sHdMy0ivsNf7KBl9sVeMi0ivsNf72ll7WVk=y0iwi0ivsMfLn1j32pX6z5g7moVvTBYLK6U9mriMy0ivsVe6z5g9sRV6z5g7srkMy0ivDqpNjBj6z5g6z5oMypXuS0iv4xYMy0ivqRf721S8W1n6z5gwmHd841kMK5VvTBD741S6z5p6z1Cvi0lxC0ivsreMC0ivsHe6z5g8mHW949R8W0VvTAVvTRm32xV7i0ivs9R721j6z6D6z1CNC0lxC0iv4NfMXxnLK6V6z5gLn6RLmdZ7W8VvUvVvTBk3s0VvTBUM2lf8mNV7W0VvTUVvTBZ7S0iv4xYMy0ivDqpODBjujqpOzBjuS0ivqhR9s1i6z6D6z5g9sRZ8i0iv49f92hU6z5gMmGVvTBf7S0iv4xf6z5gM2pT7mlgLKNj6z5g72re=y0ivspV9i0ivsxVMWVe3KxZ7mpj6z5g8n1T3C0ivsrj6z5gLK6k6z6D6z5gL2pU6z5gzsVWMy0ivsRRLmdZ7W8e6z5gw2pU6z5g9sRV6z5gMWhRMi0ivsVj6z5gMWhRMi0nwWxeN1Gn92pevmh+vnRWv2gn8TwnvzBe6z9q
```

4. decode it with [esab46](http://temp.crypo.com/esab46c.htm)
```
Hacker culture, an idea derived from a community of enthusiast computer programmers and systems designers, in the 1960s around the Massachusetts Institute of Technology's (MIT's) Tech Model Railroad Club (TMRC)[1] and MIT Artificial Intelligence Laboratory.[2] The hobbyist home computing community, focusing on hardware in the late 1970s (e.g. the Homebrew Computer Club)[3] and on software (video games,[4] software cracking, the demoscene) in the 1980s/1990s. Later, this would go on to encompass many new definitions such as art, and Life hacking. And the flag is flag{dn5_7unn3l_3xf1l7r4710n}
```

## Remark ##
`The challenge really mean something.`
```python
"base"[::-1] == "esab"
"64"[::-1] == "46"

"dns"[::-1] == "snd"
"64"[::-1] == "46"
```