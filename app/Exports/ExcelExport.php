<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExcelExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $table;

    function __construct($table) {
        $this->table = $table;
    }

    public function view(): View
    {
        // dd($this->table);
        // $project = $this->project;
        return view('excel', [
            'table' => $this->table,
        ]);
    }
}