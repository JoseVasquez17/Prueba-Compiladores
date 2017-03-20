// Generated from com/compiladores/hola/holaa/holaa.g4 by ANTLR 4.5.1
package com.compiladores.hola.holaa;
import org.antlr.v4.runtime.tree.ParseTreeListener;

/**
 * This interface defines a complete listener for a parse tree produced by
 * {@link holaaParser}.
 */
public interface holaaListener extends ParseTreeListener {
	/**
	 * Enter a parse tree produced by {@link holaaParser#start}.
	 * @param ctx the parse tree
	 */
	void enterStart(holaaParser.StartContext ctx);
	/**
	 * Exit a parse tree produced by {@link holaaParser#start}.
	 * @param ctx the parse tree
	 */
	void exitStart(holaaParser.StartContext ctx);
	/**
	 * Enter a parse tree produced by {@link holaaParser#hello}.
	 * @param ctx the parse tree
	 */
	void enterHello(holaaParser.HelloContext ctx);
	/**
	 * Exit a parse tree produced by {@link holaaParser#hello}.
	 * @param ctx the parse tree
	 */
	void exitHello(holaaParser.HelloContext ctx);
	/**
	 * Enter a parse tree produced by {@link holaaParser#world}.
	 * @param ctx the parse tree
	 */
	void enterWorld(holaaParser.WorldContext ctx);
	/**
	 * Exit a parse tree produced by {@link holaaParser#world}.
	 * @param ctx the parse tree
	 */
	void exitWorld(holaaParser.WorldContext ctx);
}