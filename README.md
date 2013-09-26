# TreeHelper

CakePHP2 Helper to print list of TreeBehavior-model as nested &lt;ul> tag.

## Requirement

CakePHP >= 2.0

## Usage

### Model

    class Category extends AppModel
    {
        public $actsAs = array('Tree');
            :

### Controller

    class CategoriesController extends AppController
    {
        public $helpers = array('Html', 'Tree');

        public function some_action()
        {
            $categories = $this->Category->find('all', array('order' => 'lft ASC'));
            $this->set(compact('categories'));
                :

### View

    echo $this->Tree->nestedUl($categories, 'Category', function ($node) {
        return $this->Html->link($node['name'], array('action' => 'view', $node['id']));
    });
