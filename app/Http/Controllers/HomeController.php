<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Directory;
use App\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $directories = Directory::with('subDirectories','files')->where('parent_id', 0)->get();
        $files = File::where('dir_id', 0)->get();
        $string = "<div class='box'><ul class='directory-list'>";
        $string .= $this->directoryTreeStructure($directories);
        $string .= $this->fileStructure($files);
        $string .= "</ul>";
        $string .= "</div>";

        return view('home')->with('directoryTreeStructure', $string);;
    }

    public function directoryTreeStructure($directories)
    {
        $string = "";

        foreach ($directories as $key => $directory) {            
            $string .= "<li class='folder'>".$directory->dir_name;
            $string .= "<div class='icons'><i aria-hidden='true' data-id='".$directory->id."' data-toggle='modal' data-target='#addModel' class='fa fa-plus-circle fa-2x add-folder'></i><a href='/".$directory->id."/directory/delete' onclick='return confirm(\"Are you sure?\")'><i aria-hidden='true' class='fa fa-minus-circle fa-2x remove'></i></a></div>";
            $string .= "<ul>";
            $string .= $this->directoryTreeStructure($directory->subDirectories);
            $string .= $this->fileStructure($directory->files);
            $string .= "</ul></li>";
        }

        return $string;
    }

    public function fileStructure($files)
    {
        $string = "";

        foreach ($files as $key => $file) {
            $string .= "<li>".$file->file_name;
            $string .= "<div class='icons'><a href='/".$file->id."/file/delete' onclick='return confirm(\"Are you sure?\")'><i aria-hidden='true' class='fa fa-minus-circle fa-2x remove'></i></a></div>";
            $string .= "</li>";
        }

        return $string;
    }

    public function addFileDirectory(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        if ($request->type == "directory") {
            $directory = new Directory();
            $directory->dir_name= $request->name;
            $directory->parent_id = $request->modelId;
            $directory->save();
        } elseif ($request->type == "file") {
            $file = new File();
            $file->file_name = $request->name;
            $file->dir_id = $request->modelId;
            $file->save();            
        }

        return redirect('/home');
    }

    public function deleteFileDirectory($id, $type) 
    {
        if ($type == "directory") {
            $directory = Directory::where('id', $id)->first();
            // $directory = Directory::find($id);
            // $directory->subDirectories()->delete();
            // $directory->files()->delete();

            $linkedDirectories = Directory::where('parent_id', $id)->get();
            $linkedFiles = File::where('dir_id', $id)->get();
            
            foreach ($linkedDirectories as $key => $linkedDirectory) {
                $linkedDirectory->delete();
            }

            foreach ($linkedFiles as $key => $linkedFile) {
                $linkedFile->delete();
            }

            $directory->delete();

            /*$linkedDirectoriesID = array();
            $linkedFilesID = array();
            $linkedDirectories = Directory::where('parent_id', $id)->get();
            $linkedFiles = File::where('dir_id', $id)->get();

            foreach ($linkedDirectories as $key => $linkedDirectory) {
                array_push($linkedDirectoriesID, $linkedDirectory->id);
            }

            foreach ($linkedFiles as $key => $linkedFile) {
                array_push($linkedFilesID, $linkedFile->id);
            }

            $deleteDirectories = Directory::whereIn('id', $linkedDirectoriesID)->delete();
            $deleteFiles = File::whereIn('id', $linkedFilesID)->delete();*/ 

            if ($directory) {
                return redirect()->back()->with('info','Directory successfully deleted!');
            } else {
                return redirect()->back()->with('info','Ooops! Please try again.');
            }

        } elseif ($type == "file") {
            $file = File::where('id', $id)->delete();

            if ($file) {
                return redirect()->back()->with('info','File successfully deleted!');
            } else {
                return redirect()->back()->with('info','Ooops! Please try again.');
            }  

        }
    }


}
