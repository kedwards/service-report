import re

with open('./service_state.json', 'r') as content_file:
    content = content_file.read()
	
regx = re.compile('(\[[^\]]*\})')

for fnd in regx.findall(content):
    print '\r\n'.join(map(repr,fnd.splitlines(True)))
    print '---------------------------------'