<?php

class Comment extends Eloquent {
	protected $fillable = array('author', 'text', 'thread_id');	
}
