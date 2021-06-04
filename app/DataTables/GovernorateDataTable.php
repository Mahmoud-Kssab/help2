<?php

namespace App\DataTables;

use App\Models\Governorate;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class GovernorateDataTable extends DataTable
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
            ->addColumn('العمليات', 'admin.governorates.actions')
            ->rawColumns(['العمليات']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Governorate $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Governorate $model)
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
                [
                    'text'      => '<i class="fa fa-plus"> </i> أضافة محافظة جديدة'  ,
                    'className' => 'btn btn-info',
                    'action'    => "function(){

                        window.location.href = '" . \URL::current() . "/create ';

                    }"

                ],

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
                'title'             => 'المحافظة',

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
        return 'Governorate_' . date('YmdHis');
    }
}
