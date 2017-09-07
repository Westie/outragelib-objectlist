<?php
/**
 *	The list interface details a common set of functions that one should stick
 *	to when making something to do with a list of objects or something
 */


namespace OUTRAGElib\Structure\ObjectList;

use \Countable;
use \Iterator;

interface ObjectListInterface extends Countable, Iterator
{
	/**
	 *	Returns the first index of this list
	 */
	public function first();
	
	
	/**
	 *	Returns the last index of this list
	 */
	public function last();
	
	
	/**
	 *	Adds an item onto the end of a list.
	 */
	public function append($value);
	
	
	/**
	 *	Shifts an item from the internal container.
	 */
	public function shift();
	
	
	/**
	 *	Shifts an item from the internal container.
	 */
	public function unshift($value);
	
	
	/**
	 *	Removes and returns the last entry of the container.
	 */
	public function pop($value);
	
	
	/**
	 *	Slices the internal container - this will not reset the pointer.
	 */
	public function slice($offset = 0, $length = null, $preserve_keys = false);
	
	
	/**
	 *	Splices the internal container - this will however reset the internal pointer.
	 */
	public function splice($offset, $length = 0, $replacement = null);
	
	
	/**
	 *	Iterator - but in a function.
	 */
	public function each(callable $callback = null);
	
	
	/**
	 *	Return a map of this element's iterator.
	 */
	public function map(callable $callback = null);
	
	
	/**
	 *	Called to shuffle the contents of this container.
	 */
	public function shuffle();
	
	
	/**
	 *	Creates a duplicate of this container
	 */
	public function duplicate();
	
	
	/**
	 *	Empties this container
	 */
	public function clear();
}