<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Prodcut;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Prodcut';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Prodcut());

        $grid->column('id', __('Id'));
        $grid->column('category_id', __('Category id'));
        $grid->column('name', __('Name'));
        $grid->column('description', __('Description'));
        $grid->column('qty', __('Qty'));
        $grid->column('price', __('Price'));
        $grid->column('is_available', __('Is available'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('deleted_at', __('Deleted at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Prodcut::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category_id', __('Category id'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('qty', __('Qty'));
        $show->field('price', __('Price'));
        $show->field('is_available', __('Is available'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Prodcut());

        $form->select('category_id', __('Category'))->options(Category::all()->pluck('name', 'id'));
        $form->text('name', __('Name'));
        $form->textarea('description', __('Description'));
        $form->number('qty', __('Qty'));
        $form->decimal('price', __('Price'));
        $form->switch('is_available', __('Is available'));

        return $form;
    }
}
