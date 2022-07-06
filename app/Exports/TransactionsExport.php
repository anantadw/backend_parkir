<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class TransactionsExport implements FromCollection, WithStyles, WithColumnWidths, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaction::all();
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getDefaultRowDimension()->setRowHeight(20);
        $sheet->getStyle('A:H')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A:H')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A1:H1')->getFont()->setBold(true);
        $sheet->getStyle('A1:H' . $sheet->getHighestRow())->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 40,
            'B' => 15,
            'C' => 20,
            'D' => 25,
            'E' => 25,
            'F' => 20,
            'G' => 15,
            'H' => 15,
        ];
    }

    public function headings(): array
    {
        return [
            'Juru Parkir',
            'Kendaraan',
            'Plat Nomor',
            'Waktu Masuk',
            'Waktu Keluar',
            'Lama Waktu',
            'Status',
            'Total Harga'
        ];
    }

    public function map($transaction): array
    {
        return [
            $transaction->device->log->parker->name,
            $transaction->vehicle->name,
            $transaction->license_plate,
            Date::dateTimeToExcel($transaction->in_time),
            ($transaction->out_time == null) ? null : Date::dateTimeToExcel($transaction->out_time),
            ($transaction->out_time == null) ? null : $transaction->out_time->diffInMinutes($transaction->in_time) . ' menit',
            ($transaction->status == 'in') ? 'Masuk' : 'Keluar',
            $transaction->total_price
        ];
    }

    public function columnFormats(): array
    {
        return [
            'D' => '[$-id-ID]dddd, dd mmmm yyyy - hh.mm.ss',
            'E' => '[$-id-ID]dddd, dd mmmm yyyy - hh.mm.ss',
            'H' => NumberFormat::FORMAT_CURRENCY_USD_SIMPLE
        ];
    }
}
