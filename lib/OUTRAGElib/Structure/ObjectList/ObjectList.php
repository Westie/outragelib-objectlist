<?php
/**
 *	The list interface details a common set of functions that one should stick
 *	to when making something to do with a list of objects or something
 */


namespace OUTRAGElib\Structure\ObjectList;

use \ArrayAccess;
use \Serializable;

class ObjectList implements ArrayAccess, ObjectListInterface, Serializable
{
	/**
	 *	An array to store the contents of this object - because of what I'm planning on
	 *	using this for, I cannot use native ArrayObject functionality
	 */
	protected $list = [];
	
	
	/**
	 *	ArrayAccess interface: Checks if an offset exists.
	 */
	public function offsetExists($property)
	{
		return isset($this->list[$property]);
	}
	
	
	/**
	 *	ArrayAccess interface: Retrieves an offset.
	 */
	public function &offsetGet($property)
	{
		$null = null;
		
		if(isset($this->list[$property]))
			return $this->list[$property];
		
		return $null;
	}
	
	
	/**
	 *	ArrayAccess interface: Gives an offset a value.
	 */
	public function offsetSet($property, $value)
	{
		if(!isset($property))
			return $this->list[] = $value;
		
		return $this->list[$property] = $value;
	}
	
	
	/**
	 *	ArrayAccess interface: Removes an offset from the array.
	 */
	public function offsetUnset($property)
	{
		unset($this->list[$property]);
	}
	
	
	/**
	 *	Countable interface: Counts the amount of accessable properties.
	 */
	public function count()
	{
		return count($this->list);
	}
	
	
	/**
	 *	Iterator interface: Returns the current accessed property.
	 */
	public function current()
	{
		return current($this->list);
	}
	
	
	/**
	 *	Iterator interface: Returns the current accessed key.
	 */
	public function key()
	{
		return key($this->list);
	}
	
	
	/**
	 *	Iterator interface: Returns the next property.
	 */
	public function next()
	{
		return next($this->list);
	}
	
	
	/**
	 *	Iterator interface: Returns the previous property.
	 */
	public function rewind()
	{
		return reset($this->list);
	}
	
	
	/**
	 *	Iterator interface: Checks if the internal array is valid.
	 */
	public function valid()
	{
		return current($this->list);
	}
	
	
	/**
	 *	Serializable interface: Returns a serialised representation of
	 *	the the current accessable pairs.
	 */
	public function serialize()
	{
		return serialize($this->list);
	}
	
	
	/**
	 *	Serializable interface: Unserialised the string into the 
	 *	local accessable cache.
	 */
	public function unserialize($container)
	{
		$this->list = unserialize($container);
		return true;
	}
	
	
	/**
	 *	ObjectListInterface interface: Called to return the first index of this array.
	 */
	public function first()
	{
		$set = array_slice($this->list, 0, 1, true);
		
		return isset($set[0]) ? $set[0] : null;
	}
	
	
	/**
	 *	ObjectListInterface interface: Called to return the last index of this array.
	 */
	public function last()
	{
		$set = array_slice($this->list, -1, 1, true);
		
		return isset($set[0]) ? $set[0] : null;
	}
	
	
	/**
	 *	ObjectListInterface interface: Push an item into the internal container.
	 */
	public function append($value)
	{
		$this->list[] = $value;
		return $this;
	}
	
	
	/**
	 *	ObjectListInterface interface: Shift an item from the internal container.
	 */
	public function shift()
	{
		return array_shift($this->list);
	}
	
	
	/**
	 *	ObjectListInterface interface: Shift an item from the internal container.
	 */
	public function unshift($value)
	{
		array_unshift($this->list, $value);
		return $this;
	}
	
	
	/**
	 *	ObjectListInterface interface: Removes and returns the last entry of the container.
	 */
	public function pop($value)
	{
		return array_pop($this->list);
	}
	
	
	/**
	 *	ObjectListInterface interface: Slices the internal container - this will not reset the pointer.
	 */
	public function slice($offset = 0, $length = null, $preserve_keys = false)
	{
		return array_slice($this->list, $offset, $length, $preserve_keys);
	}
	
	
	/**
	 *	ObjectListInterface interface: Splices the internal container - this will however reset the
	 *	internal pointer.
	 */
	public function splice($offset, $length = 0, $replacement = null)
	{
		return array_splice($this->list, $offset, $length, $replacement);
	}
	
	
	/**
	 *	ObjectListInterface interface: Iterator - but in a function.
	 */
	public function each(callable $callback = null)
	{
		foreach($this->list as $item)
		{
			if(call_user_func($callback, $item) === false)
				return $this;
		}
		
		return $this;
	}
	
	
	/**
	 *	ObjectListInterface interface: Return a map of this element's iterator.
	 */
	public function map(callable $callback = null)
	{
		return $callback ? array_map($callback, $this->list) : $this->list;
	}
	
	
	/**
	 *	ObjectListInterface interface: Called to shuffle the contents of this container.
	 */
	public function shuffle()
	{
		shuffle($this->list);
		return $this;
	}
	
	
	/**
	 *	ObjectListInterface interface: Creates a duplicate of this container
	 */
	public function duplicate()
	{
		return clone $this;
	}
	
	
	/**
	 *	ObjectListInterface interface: Empties this container
	 */
	public function clear()
	{
		$this->list = [];
		return $this;
	}
}