<?php

namespace App\Exports;

use App\Models\website\Joboffer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class OffersExport implements FromCollection, WithHeadings, WithMapping
{
    protected $advId;

    public function __construct($advId)
    {
        $this->advId = $advId;
    }

    public function collection()
    {
        return Joboffer::with(['user', 'job'])
        ->where('adv_id', $this->advId)
            ->get();
    }

    public function headings(): array
    {
        return [
            ' اسم الموظف  ',
            '  رقم الهاتف   ',
            '   معلومات اضافية   ',
            ' اسم الوظيقة  ',
            ' حالة العرض  ',
            ' تاريخ العرض  ',
        ];
    }
    public function map($offer): array
    {
        return [
            $offer->user->name,
            $offer->user->mobile,
            $offer->user->info,
            $offer->job->title,
            $offer->offer_status,
            $offer->created_at->format('Y-m-d'),
        ];
    }
}
