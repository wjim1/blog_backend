<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ArticleController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        // 此处应该使用关联模型查找值, 而不是使用find
        return Grid::make(new Article(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user_id')->display(function ($value){
                $user = User::find($value);
                return $user->name;
            });
            $grid->column('category_id')->display(function ($cate){
                $cate = Category::find($cate);
                return $cate->name;
            });
            $grid->column('title');
            $grid->column('is_show')->switch();
            $grid->column('cache');
            $grid->column('created_at');

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Article(), function (Show $show) {
            $show->field('id');
            $show->field('user_id');
            $show->field('category_id');
            $show->field('title');
            $show->field('is_show');
            $show->field('cache');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $users = User::all()->pluck('name', 'id');
        $category = Category::all()->pluck('name', 'id');
        return Form::make(new Article(), function (Form $form) use ($category, $users) {
            $form->display('id');
            $form->text('title');
            $form->select('user_id')
                ->options($users)
                ->default(1);
            $form->select('category_id')->options($category)
                ->default(1);
            $form->switch('is_show')->default(true);

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
