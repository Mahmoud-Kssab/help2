<?php

namespace App\DataTables;

use App\Models\Message;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MessageDataTable extends DataTable
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
     * @param \App\Models\Message $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Message $model)
    {
        return $model->with(['sender', 'receiver', 'medias'])->newQuery();
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

                    'name'              => 'sender.name',
                    'data'              => 'sender.name',
                    'title'             => 'الراسل',

                ],
                [

                    'name'              => 'receiver.name',
                    'data'              => 'receiver.name',
                    'title'             => 'المرسل اليه',

                ],
                [

                    'name'              => 'medias.id',
                    'data'              => 'medias.id',
                    'title'             => 'الميديا',

                ],
                [

                    'name'              => 'content',
                    'data'              => 'content',
                    'title'             => 'الرسالة',

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
        return 'Message_' . date('YmdHis');
    }
}
