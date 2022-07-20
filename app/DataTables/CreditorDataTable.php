<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CreditorDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.creditor.action')
            ->addColumn('kelengkapan', function($user) {
                $ktp_exists = $user->identity_card_picture != null ? "text-green-500" : "text-red-500";
                $kk_exists = $user->family_identity_card_picture != null ? "text-green-500" : "text-red-500";
                $tax_exists = $user->tax_identity_picture != null ? "text-green-500" : "text-red-500";
                $salary_exists = $user->salary_slip_picture != null ? "text-green-500" : "text-red-500";

                return "
                    <div class='flex flex-col'>
                        <p class='text-sm mt-0.5 font-bold {$ktp_exists}'>KTP</p>
                        <p class='text-sm mt-0.5 font-bold {$kk_exists}'>KK</p>
                        <p class='text-sm mt-0.5 font-bold {$tax_exists}'>NPWP</p>
                        <p class='text-sm mt-0.5 font-bold {$salary_exists}'>Slip Gaji</p>
                    </div>
                ";
            })
            ->editColumn('name', function($user) {
                return "
                    <div class='flex'>
                        <img class='w-16 h-16 rounded object-cover' src='{$user->picture}' />
                        <div class='flex flex-col ml-4 mt-1'>
                            <h6 class='font-bold'>{$user->name}</h6>
                            <p class='text-xs'>{$user->address}</p>
                        </div>
                    </div>
                ";
            })
            ->editColumn('role', function($user) {
                return "
                    <div class='bg-blue-500 text-xs text-white px-2 py-1 rounded font-bold uppercase'>
                        Kreditor
                    </div>
                ";
            })
            ->editColumn('created_at', function($user) {
                return $user->created_at->isoFormat('LLL');
            })
            ->rawColumns(['action', 'name', 'kelengkapan', 'role'])
            ->setRowId('name');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()
            ->where('role', 'user');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('user-table')
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
            Column::make('name')->title('Nama'),
            Column::make('email'),
            Column::computed('kelengkapan'),
            Column::make('role')->title('Peran'),
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
        return 'User_' . date('YmdHis');
    }
}
