grammar holaa;

start
:
	'hello' 'world'
;
 hello: 'hola';
 world: 'Ing' ;  

WS
:
	[ \t\r\n]+ -> skip
;