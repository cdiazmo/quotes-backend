<?php

namespace App\DataTables;

use App\Models\Author;
use App\Models\Quote;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class QuotesDataTable extends DataTable
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
            ->addColumn('author', function (Quote $quote) {
                return $quote->author->name;
            })
            ->addColumn('action', function ($row) {
                $editRoute = route("quotes.edit", $row->id);
                $deleteRoute = route("quotes.destroy", $row->id);
                return "<div class='d-flex align-items-center justify-content-between'>
                        <a href='$editRoute' class='btn-primary btn'><i class='fa fa-edit'></i></a>
                        <button type='button' url='$deleteRoute' class='btn-danger btn mx-2 btn-delete' data-toggle='modal' data-target='#deleteModal'><i class='fa fa-trash'></i></button>
                        </div";
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Quote $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Quote $model): QueryBuilder
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
            ->setTableId('quotes-table')
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
            Column::computed('author')
                ->width(120),
            Column::make('quote', 'Quote'),
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
        return 'Quotes_' . date('YmdHis');
    }
}
