<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
            ->addIndexColumn()
            ->addColumn('action', 'dashboard.product.action')
            ->editColumn('name', function($product) {
                return "
                    <div class='flex'>
                        <img class='w-16 h-16 rounded object-cover' src='{$product->picture_1}' />
                        <div class='flex flex-col ml-4 mt-1'>
                            <h6 class='font-bold'>{$product->name}</h6>
                            <div class='flex items-center'>Warna: <div class='w-4 h-4 rounded ml-1 {$product->color}'></div></div>
                        </div>
                    </div>
                ";
            })
            ->editColumn('id', function($product) {
                return "
                    <div class='flex flex-col'>
                        <div class='flex items-center mb-1'>
                            <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-eye' width='16' height='16' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                                <circle cx='12' cy='12' r='2'></circle>
                                <path d='M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7'></path>
                            </svg>
                            <span class='ml-2 text-sm'>
                                {$product->views_count}x
                            </span>
                        </div>
                        <div class='flex items-center'>
                            <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-receipt' width='16' height='16' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                                <path d='M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16l-3 -2l-2 2l-2 -2l-2 2l-2 -2l-3 2m4 -14h6m-6 4h6m-2 4h2'></path>
                            </svg>
                            <span class='ml-2 text-sm'>
                                20x
                            </span>
                        </div>
                    </div>
                ";
            })
            ->editColumn('price', function($product) {
                return 'Rp' . number_format($product->price, 0, ',', '.');
            })
            ->editColumn('stock', function($product) {
                return number_format($product->stock, 0, ',', '.');
            })
            ->editColumn('created_at', function($product) {
                return $product->created_at->isoFormat('LLL');
            })
            ->rawColumns(['name', 'id', 'action'])
            ->setRowId('name');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery()
            ->withCount(['views']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('product-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(5)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')->title('#'),
            Column::make('name')->title('Info Produk'),
            Column::make('id')->title('Statistik'),
            Column::make('price')->title('Harga'),
            Column::make('stock')->title('Stok'),
            Column::make('created_at')->title('Tanggal Pembuatan'),
            Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center')
                    ->title('Opsi'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
