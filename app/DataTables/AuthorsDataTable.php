<?php

namespace App\DataTables;

use App\Models\Author;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AuthorsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addColumn('action', function ($row) {
                $editRoute = route("authors.edit", $row->id);
                $deleteRoute = route("authors.destroy", $row->id);
                return "<div class='d-flex align-items-center justify-content-between'>
                        <a href='$editRoute' class='btn-primary btn'><i class='fa fa-edit'></i></a>
                        <button type='button' url='$deleteRoute' class='btn-danger btn mx-2 btn-delete' data-toggle='modal' data-target='#deleteModal'><i class='fa fa-trash'></i></button>
                        </div";
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Author $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Author $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('id', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('authors-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('id', 'ID'),
            Column::make('name', 'Name'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Authors_' . date('YmdHis');
    }
}
