<?php

namespace App\DataTables;

use App\Models\Offer;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;


class OfferDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */

    protected $_param;
    public function __construct($id)
    {
        $id = (int)$id;
        $this->_param = $id;
        // dd($this->_param);
    }


    public function dataTable($query)
    {

        return datatables()
            ->eloquent($query);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Offer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Offer $model)
    {
        return $model->where('work_id', $this->_param)->with(['user', 'work'])->newQuery();
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
                    'title'             => 'العرض',

                ],
                [

                    'name'              => 'user.name',
                    'data'              => 'user.name',
                    'title'             => 'الموظف',

                ],
                [

                    'name'              => 'content',
                    'data'              => 'content',
                    'title'             => 'الوصف',

                ],
                [

                    'name'              => 'min_price',
                    'data'              => 'min_price',
                    'title'             => 'السعر',

                ],
                [

                    'name'              => 'max_price',
                    'data'              => 'max_price',
                    'title'             => 'الي',

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
        return 'Offer_' . date('YmdHis');
    }
}
