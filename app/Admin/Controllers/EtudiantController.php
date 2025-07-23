<?php

namespace App\Admin\Controllers;

use \App\Models\Etudiant;
use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;

class EtudiantController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Etudiant';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Etudiant());

        $grid->column('id', __('Id'));
        $grid->column('nom', __('Nom'));
        $grid->column('prenom', __('Prenom'));
        $grid->column('email', __('Email'));
        $grid->column('date_naiss', __('Date naiss'));
        $grid->column('nationalite', __('Nationalite'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Etudiant::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nom', __('Nom'));
        $show->field('prenom', __('Prenom'));
        $show->field('email', __('Email'));
        $show->field('date_naiss', __('Date naiss'));
        $show->field('nationalite', __('Nationalite'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Etudiant());

        $form->text('nom', __('Nom'));
        $form->text('prenom', __('Prenom'));
        $form->email('email', __('Email'));
        $form->date('date_naiss', __('Date naiss'))->default(date('Y-m-d'));
        $form->text('nationalite', __('Nationalite'));

        return $form;
    }
}
