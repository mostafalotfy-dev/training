<?php

namespace App\DataTables;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

use Yajra\DataTables\Services\DataTable;

class AdminDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->editColumn("created_at",function($data){
            return $data->created_at->format("Y-m-d H:i:s");
        })
        ->editColumn("updated_at",function($data){
            return $data->updated_at->format("Y-m-d H:i:s");
        })->editColumn("id",function($data){

            return view("shared.anchor",compact("data"));
        })
        ->editColumn("roles",function($data){
                return $data->roles->pluck("name")->implode(", ");
        })
        ->editColumn("created_by",function($data){
            return $data->where("id",$data->created_by)->value("full_name");
        })
            ->addColumn('action', 'admins.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Admin $model): QueryBuilder
    {
    return $model->newQuery()->where("id","<>",1)->role("instructor");
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('admin-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),

                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id')->title("#"),
            Column::make('full_name')->title(__("Full Name")),
            Column::make('email')->title(__("Email")),
            Column::make('phone_number')->title(__("Phone Number")),
            Column::make('created_at')->title(__("Created At")),
            Column::make('updated_at')->title(__("Updated At")),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Admin_' . date('YmdHis');
    }
}
