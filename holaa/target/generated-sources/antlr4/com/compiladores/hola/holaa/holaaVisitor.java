// Generated from com/compiladores/hola/holaa/holaa.g4 by ANTLR 4.5.1
package com.compiladores.hola.holaa;
import org.antlr.v4.runtime.tree.ParseTreeVisitor;

/**
 * This interface defines a complete generic visitor for a parse tree produced
 * by {@link holaaParser}.
 *
 * @param <T> The return type of the visit operation. Use {@link Void} for
 * operations with no return type.
 */
public interface holaaVisitor<T> extends ParseTreeVisitor<T> {
	/**
	 * Visit a parse tree produced by {@link holaaParser#start}.
	 * @param ctx the parse tree
	 * @return the visitor result
	 */
	T visitStart(holaaParser.StartContext ctx);
	/**
	 * Visit a parse tree produced by {@link holaaParser#hello}.
	 * @param ctx the parse tree
	 * @return the visitor result
	 */
	T visitHello(holaaParser.HelloContext ctx);
	/**
	 * Visit a parse tree produced by {@link holaaParser#world}.
	 * @param ctx the parse tree
	 * @return the visitor result
	 */
	T visitWorld(holaaParser.WorldContext ctx);
}