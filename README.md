# TreeHelper

CakePHP2 Helper to print list of all records of TreeBehavior-model as nested &lt;ul> tag.

## Requirement

CakePHP >= 2.0

## Usage

### Install

Just place app/View/Helper/TreeHelper.php on your project.

### Model

```php
<?php
class Category extends AppModel
{
    public $actsAs = array('Tree');
        :
```

### Controller

```php
<?php
class CategoriesController extends AppController
{
    public $helpers = array('Html', 'Tree');

    public function some_action()
    {
        $categories = $this->Category->find('all', array('order' => 'lft ASC'));
        $this->set(compact('categories'));
            :
```

### View

```php
<?php
echo $this->Tree->nestedUl($categories, 'Category', function ($node) {
    return $this->Html->link($node['name'], array('action' => 'view', $node['id']));
});
```

### Reference

```
/**
 * TreeHelper#nestedUl
 * print list of all records of TreeBehavior-model as nested <ul> tag.
 *
 * @param array $list array generated with "TreeBehaviorModel::find('all', array('order' => 'lft ASC'))".
 * @param string $modelName model name.
 * @param callable $html closure to convert one record to html.
 * @return string
 */
```
