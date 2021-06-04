<?php

namespace App\DataTables;

use App\Models\Contact;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ContactDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Contact $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Contact $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {


        return $this->builder()
        ->setTableId('admindatatable-table')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->dom('Blfrtip')
        ->orderBy(1)
        ->parameters([
            'dom'          => 'Blfrtip',
            'buttons'      => [


                [ 'extend' => 'reload', 'className' => 'btn btn-primary' , 'text' => '<i class="fa fa-retweet">' ],


            ],



            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
                [

                    'name'              => 'id',
                    'data'              => 'id',
                    'title'             => '#',

                ],
                [

                    'name'              => 'name',
                    'data'              => 'name',
                    'title'             => 'الاسم',

                ],
                [

                    'name'              => 'email',
                    'data'              => 'email',
                    'title'             => 'البريد الالكتروني',
                ],
                [

                    'name'              => 'phone',
                    'data'              => 'phone',
                    'title'             => 'الهاتف',
                ],
                [

                    'name'              => 'field',
                    'data'              => 'field',
                    'title'             => 'الوظيفة',
                ],
                [

                    'name'              => 'content',
                    'data'              => 'content',
                    'title'             => 'محتوي الرسالة',
                ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Contact_' . date('YmdHis');
    }
}
