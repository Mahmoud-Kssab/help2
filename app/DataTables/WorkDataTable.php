<?php

namespace App\DataTables;

use App\Models\Work;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class WorkDataTable extends DataTable
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
            ->eloquent($query)
            ->addColumn('العمليات', 'admin.works.actions')
            ->rawColumns(['العمليات']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Work $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Work $model)
    {
        return $model->with(['user', 'media', 'categories'])->newQuery();
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

                    'name'              => 'title',
                    'data'              => 'title',
                    'title'             => 'الاعلان',

                ],
                [

                    'name'              => 'categories.name',
                    'data'              => 'categories.name',
                    'title'             => 'الوظيفة',

                ],
                [

                    'name'              => 'user.name',
                    'data'              => 'user.name',
                    'title'             => 'العميل',
                ],
                [

                    'name'              => 'address',
                    'data'              => 'address',
                    'title'             => 'العنوان',
                ],
                [

                    'name'              => 'des',
                    'data'              => 'des',
                    'title'             => 'الوصف',
                ],
                [

                    'name'              => 'ex_date',
                    'data'              => 'ex_date',
                    'title'             => 'تاريخ الانتهاء',
                ],
                [

                    'name'              => 'العمليات',
                    'data'              => 'العمليات',
                    'title'             => 'العمليات',
                    'exportable'        => false,
                    'printable'         => false,
                    'orderable'         => false,
                    'searchable'        => false,
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
        return 'Work_' . date('YmdHis');
    }
}
