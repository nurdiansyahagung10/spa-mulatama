<?php

namespace App\Http\Controllers;

use App\Exports\AnggotaExport;
use App\Models\Anggota;
use App\Models\Storting;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ExportController extends Controller
{
    public function exportanggota(Request $request)
    {
        $formpost = $request->all();
        $anggota = Anggota::with('pdl.cabang')->get();
        if ($formpost['cabang'] != 'cabang' && $formpost['pdl'] != 'pdl' && $formpost['pdl'] != null) {
            $anggota = Anggota::whereHas('pdl', function ($query) use ($formpost) {
                $query
                    ->where('nama', '=', $formpost['pdl'])
                    ->whereHas('cabang', function ($query) use ($formpost) {
                        $query->where('nama', '=', $formpost['cabang']);
                    });
            })->with('pdl.cabang')->get();
        } else if ($formpost['cabang'] != 'cabang') {
            $anggota = Anggota::whereHas('pdl.cabang', function ($query) use ($formpost) {
                $query->where('nama', '=', $formpost['cabang']);
            })->with('pdl.cabang')->get();
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [
            'No',
            'Tanggal ditambahkan',
            'Jenis anggota',
            'Pdl',
            'Cabang',
            'Nama anggota',
            'tanggal lahir',
            'Alamat rumah',
            'No hp',
            'No KK',
            'No Ktp',
            'Foto anggota',
            'foto ktp anggota',
            'foto memegang ktp',
            'Usaha',
            'Foto usaha',
            'Alamat usaha',
            'Surat Pengikat',
            'foto surat pengikat'
        ];
        // Mengisi header kolom dan menambahkan border
        $column = 'C';

        $sheet->setCellValue($column . '3', 'Table Data Anggota');
        $sheet->getStyle($column . '3')->getFont()->setBold(true)->setSize(14);

        foreach ($headers as $header) {
            $sheet->setCellValue($column . '5', $header);
            $sheet->getStyle($column . '5')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $sheet
                ->getStyle($column . '5')
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                ->setVertical(Alignment::VERTICAL_CENTER)
                ->setWrapText(true);  // Enable text wrapping to help with padding effect
            $sheet->getStyle($column . '5')->getAlignment()->setIndent(1);  // Padding effect
            $sheet->getStyle($column . '5')->getFont()->setBold(true);
            $column++;
        }

        // Mengisi data ke dalam sheet menggunakan loop
        $row = 6;  // Mulai dari baris kedua karena baris pertama adalah header
        $iteration = 1;
        foreach ($anggota as $item) {
            $sheet->setCellValue('C' . $row, $iteration);

            if ($item->created_at != null) {
                $sheet->setCellValue('D' . $row, $item->created_at);
            } else {
                $sheet->setCellValue('D' . $row, '-');
            }

            if ($item->jenis_anggota != null) {
                $sheet->setCellValue('E' . $row, $item->jenis_anggota);  // Sesuaikan dengan field yang benar
            } else {
                $sheet->setCellValue('E' . $row, '-');  // Sesuaikan dengan field yang benar
            }
            $sheet->setCellValue('F' . $row, $item->pdl->nama);  // Mengambil nama PDL
            $sheet->setCellValue('G' . $row, $item->pdl->cabang->nama);  // Mengambil nama Cabang
            $sheet->setCellValue('H' . $row, $item->nama);  // Sesuaikan dengan field yang benar

            if ($item->tanggal_lahir != null) {
                $sheet->setCellValue('I' . $row, $item->tanggal_lahir);
            } else {
                $sheet->setCellValue('I' . $row, '-');
            }

            if ($item->alamat != null) {
                $sheet->setCellValue('J' . $row, $item->alamat);
            } else {
                $sheet->setCellValue('J' . $row, '-');
            }

            if ($item->nohp != null) {
                $sheet->setCellValue('K' . $row, $item->nohp);
            } else {
                $sheet->setCellValue('K' . $row, '-');
            }

            if ($item->kk != null) {
                $sheet->setCellValue('L' . $row, $item->kk);
            } else {
                $sheet->setCellValue('L' . $row, '-');
            }

            if ($item->ktp != null) {
                $sheet->setCellValue('M' . $row, $item->ktp);
            } else {
                $sheet->setCellValue('M' . $row, '-');
            }

            if ($item->foto_anggota != null) {
                $sheet->setCellValue('N' . $row, url('/') . '/Image/' . $item->pdl->cabang->id . '/' . $item->pdl->id . '/' . $item->id . '/' . $item->created_at->format('Y-m-d') . '/pengajuan/ktp dan anggota/' . $item->foto_anggota);
            } else {
                $sheet->setCellValue('N' . $row, '-');
            }
            if ($item->foto_ktp_anggota != null) {
                $sheet->setCellValue('O' . $row, url('/') . '/Image/' . $item->pdl->cabang->id . '/' . $item->pdl->id . '/' . $item->id . '/' . $item->created_at->format('Y-m-d') . '/pengajuan/ktp dan anggota/' . $item->foto_ktp_anggota);
            } else {
                $sheet->setCellValue('O' . $row, '-');
            }
            if ($item->foto_memegang_ktp != null) {
                $sheet->setCellValue('P' . $row, url('/') . '/Image/' . $item->pdl->cabang->id . '/' . $item->pdl->id . '/' . $item->id . '/' . $item->created_at->format('Y-m-d') . '/pengajuan/ktp dan anggota/' . $item->foto_memegang_ktp);
            } else {
                $sheet->setCellValue('P' . $row, '-');
            }
            $sheet->setCellValue('Q' . $row, $item->usaha);
            if ($item->foto_usaha != null) {
                $sheet->setCellValue('R' . $row, url('/') . '/Image/' . $item->pdl->cabang->id . '/' . $item->pdl->id . '/' . $item->id . '/' . $item->created_at->format('Y-m-d') . '/pengajuan/tempat usaha/' . $item->foto_usaha);
            } else {
                $sheet->setCellValue('R' . $row, '-');
            }

            if ($item->alamat_usaha != null) {
                $sheet->setCellValue('S' . $row, $item->alamat_usaha);
            } else {
                $sheet->setCellValue('S' . $row, '-');
            }

            if ($item->pengikat != null) {
                $sheet->setCellValue('T' . $row, $item->pengikat);
            } else {
                $sheet->setCellValue('T' . $row, '-');
            }

            if ($item->foto_surat_pengikat != null) {
                $sheet->setCellValue('U' . $row, url('/') . '/Image/' . $item->pdl->cabang->id . '/' . $item->pdl->id . '/' . $item->id . '/' . $item->created_at->format('Y-m-d') . '/pengajuan/surat pengikat/' . $item->foto_surat_pengikat);
            } else {
                $sheet->setCellValue('U' . $row, '-');
            }
            foreach (range('C', 'U') as $columnLetter) {
                $cell = $columnLetter . $row;
                $sheet->getStyle($cell)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                $sheet
                    ->getStyle($cell)
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER)
                    ->setWrapText(true);  // Enable text wrapping to help with padding effect
                $sheet->getStyle($cell)->getAlignment()->setIndent(1);  // Padding effect
            }
            $row++;
            $iteration++;
        }

        foreach (range('C', 'U') as $columnLetter) {
            $sheet->getColumnDimension($columnLetter)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'users.xlsx';
        ob_start();
        $writer->save('php://output');
        $excelOutput = ob_get_clean();

        return response($excelOutput)
            ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"')
            ->header('Cache-Control', 'max-age=0')
            ->header('Pragma', 'public')
            ->header('Expires', '0');
    }

    public function exportstorting(Request $request)
    {
        $formpost = $request->all();
        $storting = Storting::with('dropping.anggota.pdl.cabang')->get();
        if ($formpost['cabang'] != 'cabang' && $formpost['pdl'] != 'pdl' && $formpost['pdl'] != null) {
            $storting = Storting::whereHas('dropping.anggota.pdl', function ($query) use ($formpost) {
                $query
                    ->where('nama', '=', $formpost['pdl'])
                    ->whereHas('cabang', function ($query) use ($formpost) {
                        $query->where('nama', '=', $formpost['cabang']);
                    });
            })->with('dropping.anggota.pdl.cabang')->get();
        } else if ($formpost['cabang'] != 'cabang') {
            $storting = Storting::whereHas('dropping.anggota.pdl.cabang', function ($query) use ($formpost) {
                $query->where('nama', '=', $formpost['cabang']);
            })->with('dropping.anggota.pdl.cabang')->get();
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [
            'No',
            'Tanggal storting',
            'Nama Anggota',
            'pdl',
            'cabang',
            'dropping',
            'target',
            'jasa (10%)',
            'Total target',
            'Jumlah storting',
            'Macet',
            'Foto bukti storting',
            'Catatan storting',
        ];
        // Mengisi header kolom dan menambahkan border
        $column = 'C';

        $sheet->setCellValue($column . '3', 'Table Data Storting');
        $sheet->getStyle($column . '3')->getFont()->setBold(true)->setSize(14);

        foreach ($headers as $header) {
            $sheet->setCellValue($column . '5', $header);
            $sheet->getStyle($column . '5')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $sheet
                ->getStyle($column . '5')
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                ->setVertical(Alignment::VERTICAL_CENTER)
                ->setWrapText(true);  // Enable text wrapping to help with padding effect
            $sheet->getStyle($column . '5')->getAlignment()->setIndent(1);  // Padding effect
            $sheet->getStyle($column . '5')->getFont()->setBold(true);
            $column++;
        }

        // Mengisi data ke dalam sheet menggunakan loop
        $row = 6;  // Mulai dari baris kedua karena baris pertama adalah header
        $iteration = 1;
        foreach ($storting as $item) {
            $sheet->setCellValue('C' . $row, $iteration);

            if ($item->tanggal_storting != null) {
                $sheet->setCellValue('D' . $row, $item->tanggal_storting);
            } else {
                $sheet->setCellValue('D' . $row, '-');
            }

            $sheet->setCellValue('E' . $row, $item->dropping->anggota->nama);  // Sesuaikan dengan field yang benar
            $sheet->setCellValue('F' . $row, $item->dropping->anggota->pdl->nama);  // Mengambil nama PDL
            $sheet->setCellValue('G' . $row, $item->dropping->anggota->pdl->cabang->nama);  // Mengambil nama Cabang
            $sheet->setCellValue('H' . $row, $item->dropping->nominal_dropping . ' / ' . $item->dropping->tanggal_dropping);  // Sesuaikan dengan field yang benar
            $sheet->setCellValue('I' . $row, $item->dropping->nominal_dropping / 10);
            $sheet->setCellValue('J' . $row, $item->dropping->nominal_dropping / 10 * 0.1);
            $sheet->setCellValue('K' . $row, $item->dropping->nominal_dropping / 10 + $item->dropping->nominal_dropping / 10 * 0.1);
            $sheet->setCellValue('L' . $row, $item->nominal_storting);
            $sheet->setCellValue('M' . $row, $item->nominal_storting - $item->dropping->nominal_dropping / 10 + $item->dropping->nominal_dropping / 10 * 0.1);

            if ($item->foto_anggota != null) {
                $sheet->setCellValue('N' . $row, url('/') . '/Image/' . $storting->dropping->anggota->pdl->cabang->id . '/' . $storting->dropping->anggota->pdl->id . '/' . $storting->dropping->anggota->id . '/' . $storting->dropping->anggota->created_at->format('Y-m-d') . '/storting/' . $item->bukti);
            } else {
                $sheet->setCellValue('N' . $row, '-');
            }
            if ($item->note != null) {
                $sheet->setCellValue('O' . $row, $item->note);
            } else {
                $sheet->setCellValue('O' . $row, '-');
            }

            foreach (range('C', 'O') as $columnLetter) {
                $cell = $columnLetter . $row;
                $sheet->getStyle($cell)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                $sheet
                    ->getStyle($cell)
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER)
                    ->setWrapText(true);  // Enable text wrapping to help with padding effect
                $sheet->getStyle($cell)->getAlignment()->setIndent(1);  // Padding effect
            }
            $row++;
            $iteration++;
        }

        foreach (range('C', 'O') as $columnLetter) {
            $sheet->getColumnDimension($columnLetter)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'users.xlsx';
        ob_start();
        $writer->save('php://output');
        $excelOutput = ob_get_clean();

        return response($excelOutput)
            ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"')
            ->header('Cache-Control', 'max-age=0')
            ->header('Pragma', 'public')
            ->header('Expires', '0');
    }
}
