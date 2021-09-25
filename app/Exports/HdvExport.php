<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;


use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter\AlignFormatter;

class HdvExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    use Exportable;
    public $Formato;
    public $Separator;
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    
    public function collection()
    {   
        return collect($this->data);
        
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => $this->Separator,
            'enclosure' => ''
        ];
    }

    public function headings(): array
    {
            return [
                'CEDULA',
                'NOMBRES',
                'APELLIDOS',
                'TELEFONO',
                'DIRECCION',
                'CORREO',
                'GENERO',
                'NACIONALIDAD',
                'ESTADO CIVIL',
                'FECHA NACIMIENTO',
                'RH'
            ];  
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A:L';
                $event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()->applyFromArray(
                    array(
                        'horizontal' => 'center', //left,right,center & vertical
                    )
                );
                $style = array(
                    'alignment' => array(
                            'horizontal' => Align::HORIZONTAL_CENTER,
                    )
                );
            
                $sheet->getStyle("A:L")->applyFromArray($style);
                //Color para cabecera
                $cellRange = 'A1:L1';
                $event->getDelegate()->getStyle($cellRange)->applyFromArray(
                    [
                        'font' => [
                            'bold' => true,
                            'color' => ['argb' => "FFFFFF"],
                        ],
                        'fill' => [
                            'fillType' => Fill::FILL_SOLID,
                            'color' => ['argb' => "b0060f"],
                        ],
                    ]
                );
            },
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

        ];
    }
}
