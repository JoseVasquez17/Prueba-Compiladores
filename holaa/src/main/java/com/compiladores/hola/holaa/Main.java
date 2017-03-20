
package com.compiladores.hola.holaa;
import java.io.IOException;

import org.antlr.v4.runtime.ANTLRFileStream;
import org.antlr.v4.runtime.CommonTokenStream;

public class Main {

	private static final String EXTENSION = "mundo";

	public static void main(String[] args) throws IOException {
		String program = args.length > 1 ? args[1] : "test/test." + EXTENSION;

		System.out.println("Interpreting file " + program);

		holaaLexer lexer = new holaaLexer(new ANTLRFileStream(program));
		CommonTokenStream tokens = new CommonTokenStream(lexer);
		holaaParser parser = new holaaParser(tokens);

		holaaParser.StartContext tree = parser.start();

		holaaCustomVisitor visitor = new holaaCustomVisitor();
		visitor.visit(tree);

		System.out.println("Interpretation finished");

	}

}
