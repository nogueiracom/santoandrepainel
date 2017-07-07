<?php

namespace App\Http\Controllers\Admin;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ComunicadoArticleRequest as StoreRequest;
use App\Http\Requests\ComunicadoArticleRequest as UpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class ComunicadoCrudController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel("App\Models\ComunicadoArticle");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/comunicado');
        $this->crud->setEntityNameStrings('comunicado', 'comunicados');

        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
                                'name' => 'date',
                                'label' => 'Date',
                                'type' => 'date',

                            ]);
        $this->crud->addColumn([
                                'name' => 'status',
                                'label' => 'Status',
                            ]);
        $this->crud->addColumn([
                                'name' => 'title',
                                'label' => 'Title',
                            ]);
        $this->crud->addColumn([
                                'name' => 'featured',
                                'label' => 'Featured',
                                'type' => 'check',
                            ]);
        $this->crud->addColumn([
                                'label' => 'Category',
                                'type' => 'select',
                                'name' => 'category_id',
                                'entity' => 'category',
                                'attribute' => 'name',
                                'model' => "App\Models\ComunicadoCategory",
                            ]);

        // ------ CRUD FIELDS
        $this->crud->addField([    // TEXT
                                'name' => 'title',
                                'label' => 'Title',
                                'type' => 'text',
                                'placeholder' => 'Your title here',
                            ]);
        $this->crud->addField([
                                'name' => 'slug',
                                'label' => 'Slug (URL)',
                                'type' => 'text',
                                'hint' => 'Will be automatically generated from your title, if left empty.',
                                // 'disabled' => 'disabled'
                            ]);

        $this->crud->addField([   // Browse
                                'name' => 'image',
                                'label' => 'Image',
                                'type' => 'browse'
                            ]);

        $this->crud->addField([    // TEXT
                                'name' => 'date',
                                'label' => 'Date',
                                'type' => 'date',
                                'value' => date('Y-m-d'),
                            ], 'create');
        $this->crud->addField([    // TEXT
                                'name' => 'date',
                                'label' => 'Date',
                                'type' => 'date',
                            ], 'update');

        $this->crud->addField([    // WYSIWYG
                                'name' => 'content',
                                'label' => 'Content',
                                'type' => 'ckeditor',
                                'placeholder' => 'Your textarea text here',
                            ]);

        $this->crud->addField([    // SELECT
                                'label' => 'Category',
                                'type' => 'select2',
                                'name' => 'category_id',
                                'entity' => 'category',
                                'attribute' => 'name',
                                'model' => "App\Models\ComunicadoCategory",
                            ]);

        $this->crud->addField([    // ENUM
                                'name' => 'status',
                                'label' => 'Status',
                                'type' => 'enum',
                            ]);
        $this->crud->addField([    // CHECKBOX
                                'name' => 'featured',
                                'label' => 'Featured item',
                                'type' => 'checkbox',
                            ]);

        $this->crud->enableAjaxTable();
    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
    }

    public function update(UpdateRequest $request)
    {

        // if (empty ($request->get('photos'))) {
        //     $this->crud->update(\Request::get($this->crud->model->getKeyName()), ['photos' => '[]']);
        // }
        return parent::updateCrud();
    }



}
