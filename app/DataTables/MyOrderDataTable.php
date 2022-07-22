<?php

namespace App\DataTables;

use App\Models\Checkout;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MyOrderDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.my-order.action')
            ->addColumn('progress_cicilan', function($checkout) {
                $payment_counts = $checkout->payments->count() + 1;
                return "{$payment_counts} / {$checkout->duration}";
            })
            ->editColumn('product.name', function($checkout) {
                $product = $checkout->product;
                $per_month_installment = number_format($checkout->installment, 2, '.', ',');

                return "
                    <div class='flex'>
                        <img class='w-16 h-16 rounded object-cover' src='{$product->picture_1}' />
                        <div class='flex flex-col ml-4 mt-1'>
                            <h6 class='font-bold mb-0.5'>{$product->name}</h6>
                            <p class='text-xs'>Durasi Cicilan: {$checkout->duration} bulan</p>
                            <p class='text-xs'>Cicilan per-bulan: Rp {$per_month_installment}</p>
                        </div>
                    </div>
                ";
            })
            ->editColumn('duration', function($checkout) {
                return $checkout->duration . " bulan";
            })
            ->editColumn('created_at', function($checkout) {
                return $checkout->created_at->isoFormat('LLL');
            })
            ->setRowClass(function($checkout) {
                $payment_counts = $checkout->payments->count() + 1;

                if ($payment_counts == $checkout->duration) {
                    return 'opacity-25';
                }
            })
            ->rawColumns(['action', 'product.name'])
            ->setRowId('name');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Checkout $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Checkout $model): QueryBuilder
    {
        return $model->newQuery()
            ->with(['user', 'product', 'payments'])
            ->where('user_id', auth()->id())
            ->select($model->getTable() . ".*");
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('checkout-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
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
            Column::make('product.name')->title('Nama Produk'),
            Column::make('quantity')->title('Banyak Produk'),
            Column::make('duration')->title('Durasi Cicilan'),
            Column::computed('progress_cicilan'),
            Column::make('created_at')->title('Tanggal Order'),
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
        return 'Checkout_' . date('YmdHis');
    }
}
