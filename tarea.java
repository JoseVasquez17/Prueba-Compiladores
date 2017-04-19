
//importar paquete para trabajar con expresiones regulares
import java.util.regex.Matcher;
import java.util.regex.Pattern;


public class tarea {
public static void main (String[] args){

       String patron = ("([0-9]+)|([A-Z])|([-|+])|([/|*])|([a-z])|([< % > ])");
       //expresion a evaluar
       String Texto = "HOLA MUD¡ * / sefue <%> WHILE " ;
       
       Pattern p = Pattern.compile(patron);
       Matcher matcher =  p.matcher(Texto);
       
       System.out.println("Compiladores * prueba analis lexico");
       System.out.println("Ejercicio de Prueba ");

while(matcher.find())
       {
	      String tokenTipo1 = matcher.group(1);
	      if(tokenTipo1 !=null)
	      {
	    	  System.out.println("numero: " + tokenTipo1);
	      }
	      
	      String tokenTipo2 = matcher.group(2);
	      if(tokenTipo2 !=null)
	      {
	    	  System.out.println("Ciclos: " + tokenTipo2);
	      }
	      
	      String tokenTipo3 = matcher.group(3);
	      if(tokenTipo3 !=null)
	      {
	    	  System.out.println("suma y resta : " + tokenTipo3);
	      }
	      String tokenTipo4 = matcher.group(4);
	      if(tokenTipo4 !=null)
	      {
	    	  System.out.println("multiplicacion y division : " + tokenTipo4);
	      }
	      
	      String tokenTipo5 = matcher.group(5);
	      if(tokenTipo5 !=null)
	      {
	    	  System.out.println("variables: " + tokenTipo5);
	      }
	      String tokenTipo6 = matcher.group(6);
	      if(tokenTipo6 !=null)
	      {
	    	  System.out.println("operadores : " + tokenTipo6);
       }
       
    	   
       }
}
}