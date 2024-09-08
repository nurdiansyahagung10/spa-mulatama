<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FileController extends Controller
{
    public function getFileStructure()
    {
        // Path to the directory you want to read
        $path = base_path(); // or specify your directory

        // Get the structure of the directory
        $files = $this->getDirectoryStructure($path);

        return response()->json($files);
    }

    private function getDirectoryStructure($dir)
    {
        $result = [];
        $items = File::files($dir);

        foreach ($items as $item) {
            $result[] = [
                'type' => 'file',
                'name' => $item->getFilename(),
                'path' => $item->getRealPath(),
            ];
        }

        $directories = File::directories($dir);
        foreach ($directories as $directory) {
            $result[] = [
                'type' => 'directory',
                'name' => basename($directory),
                'path' => $directory,
                'children' => $this->getDirectoryStructure($directory),
            ];
        }

        return $result;
    }
}
