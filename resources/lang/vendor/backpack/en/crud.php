<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Dick Crud Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the CRUD interface.
    | You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    // Forms
    'save_action_save_and_new' => 'Salvar e adicionar novo',
    'save_action_save_and_edit' => 'Salvar e continuar editando',
    'save_action_save_and_back' => 'Salvar e sair',
    'save_action_changed_notification' => 'Default behaviour after saving has been changed.',

    // Create form
    'add'                 => 'Adicionar',
    'back_to_all'         => 'Voltar á ',
    'cancel'              => 'Cancelar',
    'add_a_new'           => 'Adicionar Nova',

        // Create form - advanced options
        'after_saving'            => 'After saving',
        'go_to_the_table_view'    => 'go to the table view',
        'let_me_add_another_item' => 'let me add another item',
        'edit_the_new_item'       => 'edit the new item',

    // Edit form
    'edit'                 => 'Editar',
    'save'                 => 'Salvar',

    // CRUD table view
    'all'                       => 'Todas ',
    'in_the_database'           => 'cadastradas',
    'list'                      => 'Lista',
    'actions'                   => 'Funções',
    'preview'                   => 'Vizualisar',
    'delete'                    => 'Deletar',
    'admin'                     => 'Admin',
    'details_row'               => 'This is the details row. Modify as you please.',
    'details_row_loading_error' => 'There was an error loading the details. Please retry.',

        // Confirmation messages and bubbles
        'delete_confirm'                              => 'Are you sure you want to delete this item?',
        'delete_confirmation_title'                   => 'Item Deleted',
        'delete_confirmation_message'                 => 'The item has been deleted successfully.',
        'delete_confirmation_not_title'               => 'NOT deleted',
        'delete_confirmation_not_message'             => "There's been an error. Your item might not have been deleted.",
        'delete_confirmation_not_deleted_title'       => 'Not deleted',
        'delete_confirmation_not_deleted_message'     => 'Nothing happened. Your item is safe.',

        // DataTables translation
        'emptyTable'     => 'No data available in table',
        'info'           => 'Mostrar _START_ a _END_ de _TOTAL_ paginas',
        'infoEmpty'      => 'Mostrar 0 a 0 de 0 paginas',
        'infoFiltered'   => '(filtered from _MAX_ total entries)',
        'infoPostFix'    => '',
        'thousands'      => ',',
        'lengthMenu'     => '_MENU_ por página',
        'loadingRecords' => 'Loading...',
        'processing'     => 'Processing...',
        'search'         => 'Procurar: ',
        'zeroRecords'    => 'Nenhum cadastro',
        'paginate'       => [
            'first'    => 'First',
            'last'     => 'Last',
            'next'     => 'Próximo',
            'previous' => 'Anterior',
        ],
        'aria' => [
            'sortAscending'  => ': activate to sort column ascending',
            'sortDescending' => ': activate to sort column descending',
        ],

    // global crud - errors
    'unauthorized_access' => 'Unauthorized access - you do not have the necessary permissions to see this page.',
    'please_fix' => 'Please fix the following errors:',

    // global crud - success / error notification bubbles
    'insert_success' => 'The item has been added successfully.',
    'update_success' => 'The item has been modified successfully.',

    // CRUD reorder view
    'reorder'                      => 'Reorder',
    'reorder_text'                 => 'Use drag&drop to reorder.',
    'reorder_success_title'        => 'Done',
    'reorder_success_message'      => 'Your order has been saved.',
    'reorder_error_title'          => 'Error',
    'reorder_error_message'        => 'Your order has not been saved.',

    // Fields
    'browse_uploads' => 'Browse uploads',
    'clear' => 'Clear',
    'page_link' => 'Page link',
    'page_link_placeholder' => 'http://example.com/your-desired-page',
    'internal_link' => 'Internal link',
    'internal_link_placeholder' => 'Internal slug. Ex: \'admin/page\' (no quotes) for \':url\'',
    'external_link' => 'External link',
    'choose_file' => 'Enviar arquivo',

];
