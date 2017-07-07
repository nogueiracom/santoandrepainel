<?php

namespace App;



trait PageTemplates
{
    /*
    |--------------------------------------------------------------------------
    | Page Templates for Backpack\PageManager
    |--------------------------------------------------------------------------
    |
    | Each page template has its own method, that define what fields should show up using the Backpack\CRUD API.
    | Use snake_case for naming and PageManager will make sure it looks pretty in the create/update form
    | template dropdown.
    |
    | Any fields defined here will show up after the standard page fields:
    | - select template
    | - page name (only seen by admins)
    | - page title
    | - page slug
    */


    private function empreendimentos()

    {

        function get() {

              $data = Role::pluck('name', 'id');
              return $data;
        }

        $this->crud->addField([
      			'label' => "Adicionar Usuario", // Nome do campo
            'type' => 'select2_from_array',
            'options' => get(),
      	    'name' => 'nome_usuario_dois', // the db column for the foreign key
            'allows_multiple' => false, // OPTIONAL;
            'fake' => true,
            'store_in' => 'extras',
    		]);


        $this->crud->addField([  // Select
           'label' => "Category",
           'type' => 'select',
           'name' => 'category_id', // the db column for the foreign key
           'entity' => 'category', // the method that defines the relationship in your Model
           'attribute' => 'name', // foreign key attribute that is shown to user
           'model' => "App\Models\ComunicadoCategory", // foreign key model
        ]);


        $this->crud->addField([
                        'name' => 'content',
                        'label' => 'Escreva mensagem para exibir pro cliente.',
                        'type' => 'wysiwyg',
                        'placeholder' => 'Your content here',
        ]);

        // $this->crud->addField([ // image
        //   'label' => "Logo do Empreendimento",
        //    'name' => "image",
        //    'type' => 'image',
        //    'upload' => true,
        //    'crop' => false, // set to true to allow cropping, false to disable
        //    'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
        //    'fake' => true,
        //    'store_in' => 'nome_usuario',
        //    //'prefix' => 'stora/empreendimento/' // in case you only store the filename in the database, this text will be prepended to the database value
        // ]);

        $this->crud->addField([   // Upload
            'name' => 'image',
            'label' => 'Image',
            'type' => 'browse',
            'fake' => true,
            'store_in' => 'nome_usuario'
        ]);




    }

    private function about_us()
    {
        $this->crud->addField([
                        'name' => 'content',
                        'label' => 'Content',
                        'type' => 'wysiwyg',
                        'placeholder' => 'Your content here',
                      ]);

        $this->crud->addField([  // Select
           'label' => "Category",
           'type' => 'select',
           'name' => 'category_id', // the db column for the foreign key
           'entity' => 'category', // the method that defines the relationship in your Model
           'attribute' => 'name', // foreign key attribute that is shown to user
           'model' => "App\Models\Category", // foreign key model
        ]);


        $this->crud->addField([   // CustomHTML
                          'name' => 'metas_separator',
                          'type' => 'custom_html',
                          'value' => '<br><h2>Metas</h2><hr>',
                      ]);
        $this->crud->addField([
                          'name' => 'meta_title',
                          'label' => 'Meta Title',
                          'fake' => true,
                          'store_in' => 'extras',
                      ]);
        $this->crud->addField([
                          'name' => 'meta_description',
                          'label' => 'Meta Description',
                          'fake' => true,
                          'store_in' => 'extras',
                      ]);
          $this->crud->addField([
                          'name' => 'meta_keywords',
                          'type' => 'textarea',
                          'label' => 'Meta Keywords',
                          'fake' => true,
                          'store_in' => 'extras',
                      ]);
    }

}
