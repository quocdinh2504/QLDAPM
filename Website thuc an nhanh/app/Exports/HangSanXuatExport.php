<?php

namespace App\Exports;

use App\Models\HangSanXuat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;

class HangSanXuatExport implements FromCollection, WithHeadings, WithMapping
{
    // Tiêu đề cột trong file Excel
    public function headings(): array
    {
        return [
            'id',
            'tenhang',
            'tenhang_slug',
            'hinhanh',
        ];
    }

    // Dữ liệu từng dòng
    public function map($row): array
    {
        return [
            $row->id,
            $row->tenhang,
            $row->tenhang_slug,
            $row->hinhanh,
        ];
    }

    public function startCell(): string
    {
        return 'A1';
    }

    public function collection()
    {
        return HangSanXuat::all();
    }  
}