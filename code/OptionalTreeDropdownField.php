<?php
/**
 * Extend SilverStripe TreeDropdownField to allow clearing a selection
 *
 * Tested with SilverStripe 3.1.2
 *
 * Usage:
 * $treeField = new OptionalTreeDropdownField('MyFieldID', 'My Field Title', 'SiteTree');
 * $treeField->setEmptyString('(Choose)');
 */
class OptionalTreeDropdownField extends TreeDropdownField
{

	private static $allowed_actions = array(
		'tree'
	);

	/**
	 * @var boolean $hasEmptyDefault Show the first <option> element as
	 * empty (not having a value), with an optional label defined through
	 * {@link $emptyString}. By default, the <select> element will be
	 * rendered with the first option from {@link $source} selected.
	 */
	protected $hasEmptyDefault = false;

	/**
	 * @var string $emptyString The title shown for an empty default selection,
	 * e.g. "Select...".
	 */
	protected $emptyString = '';

	/**
	 * @param boolean $bool
	 */
	public function setHasEmptyDefault($bool) {
		$this->hasEmptyDefault = $bool;
		return $this;
	}

	/**
	 * @return boolean
	 */
	public function getHasEmptyDefault() {
		return $this->hasEmptyDefault;
	}

	/**
	 * Set the default selection label, e.g. "select...".
	 * Defaults to an empty string. Automatically sets
	 * {@link $hasEmptyDefault} to true.
	 *
	 * @param string $str
	 */
	public function setEmptyString($str) {
		$this->setHasEmptyDefault(true);
		$this->emptyString = $str;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getEmptyString() {
		return $this->emptyString;
	}

	/**
	 * Get the whole tree of a part of the tree via an AJAX request.
	 *
	 * @param SS_HTTPRequest $request
	 * @return string
	 */
	public function tree(SS_HTTPRequest $request) {
		// Get tree from parent
		$tree = parent::tree($request);
		if($this->getHasEmptyDefault()) {
			// Insert empty option into tree
			$lf = "\n";
			$tree = str_replace(
				'<ul class="tree">'.$lf,
				'<ul class="tree">'.$lf.
					'<li id="selector-LinkInternalID-0" data-id="0" class="class-NoPageSelect closed"><a rel="0">'.
						$this->getEmptyString().
					'</a></li>'.$lf,
				 $tree
			);
		}
		return $tree;
	}

}