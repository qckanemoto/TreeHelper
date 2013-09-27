<?php
App::uses('AppHelper', 'View/Helper');
App::uses('Hash', 'Utility');

class TreeHelper extends AppHelper
{
	public $helpers = array('Html');

	/**
	 * print list of all records of TreeBehavior-model as nested <ul> tag.
	 *
	 * @param array $list array generated with "TreeBehaviorModel::find('all', array('order' => 'lft ASC'))".
	 * @param string $modelName model name.
	 * @param callable $html closure to convert one record to html.
	 * @return string
	 */
	public function nestedUl(array $list, $modelName, callable $html)
	{
		$list = Hash::nest($list);

		$out = '';
		foreach ($list as $node) {
			$children = '';
			if (!empty($node['children'])) {
				$children = $this->nestedUl($node['children'], $modelName, $html);
			}
			$out .= $this->Html->tag('li', $html($node[$modelName]) . $children);
		}

		return $out ? $this->Html->tag('ul', $out) : '';
	}
}
