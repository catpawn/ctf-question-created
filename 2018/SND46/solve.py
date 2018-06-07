from scapy.all import rdpcap, DNSQR, DNSRR

output = ""
for p in rdpcap('Misc150.pcapng'):
	if p.haslayer(DNSQR) and not p.haslayer(DNSRR):
		qry = p[DNSQR].qname.replace('.blacktr.org', '').split('.')
		output = output + qry[0]
print output
