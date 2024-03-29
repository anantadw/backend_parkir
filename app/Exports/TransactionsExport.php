<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class TransactionsExport implements FromCollection, WithStyles, WithColumnWidths, WithHeadings, WithMapping, WithColumnFormatting
{
    private $year, $month;

    public function __construct(int $year, int $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Transaction::with(['vehicle', 'parker', 'parker.street'])->whereYear('created_at', $this->year)->whereMonth('created_at', $this->month)->latest()->get();
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
            'A' => 30,
            'B' => 30,
            'C' => 15,
            'D' => 20,
            'E' => 30,
            'F' => 30,
            'G' => 20,
            'H' => 20,
        ];
    }

    public function headings(): array
    {
        return [
            'Juru Parkir',
            'Jalan',
            'Kendaraan',
            'Plat Nomor',
            'Waktu Masuk',
            'Waktu Keluar',
            'Lama Waktu',
            'Total Harga'
        ];
    }

    public function map($transaction): array
    {
        return [
            $transaction->parker->name,
            $transaction->parker->street->name,
            $transaction->vehicle->name,
            $transaction->license_plate,
            Date::dateTimeToExcel($transaction->in_time),
            ($transaction->out_time == null) ? null : Date::dateTimeToExcel($transaction->out_time),
            ($transaction->out_time == null) ? null : $transaction->out_time->diffInMinutes($transaction->in_time) . ' menit',
            $transaction->total_price
        ];
    }

    public function columnFormats(): array
    {
        return [
            'E' => '[$-id-ID]dddd, dd mmmm yyyy - hh.mm',
            'F' => '[$-id-ID]dddd, dd mmmm yyyy - hh.mm',
        ];
    }
}
