<?php

namespace App\Http\Controllers;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::paginate();
        
        return view('task.index', compact('tasks'))
            ->with('i', (request()->input('page', 1) - 1) * $tasks->perPage());
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


     /*public function generateTaskReport($id)
     {
         $users = User::findOrFail($id);
         $tasks = Task::where('user_id', $users->id)->get();
     
         $pdf = PDF::loadView('task.taskReportPDF', compact('users','tasks'));
         return $pdf->download('task_report.pdf');
     }*/




    public function create()
    {
        $task = new Task();
        $statuses = Status::all();
        return view('task.create', compact('task', 'statuses'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Task::$rules,[
            'start_date' => 'nullable|string',
            'Report' => 'nullable|string',
            'upload_files' => 'nullable|string',
        ]);

        if ($request->hasFile('upload_files')) {
            $archivo = $request->file('upload_files');
            $nombreArchivo = $archivo->getClientOriginalName(); // Obtener el nombre original del archivo
            $path = $archivo->storeAs('public/archivos', $nombreArchivo); // Almacenar el archivo con su nombre original en storage/app/public/archivos
        }

        

        $task = Task::create($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }


    public function viewReport($id)
{
    $task = Task::findOrFail($id);

    // Aquí puedes pasar los datos necesarios para la vista del reporte en detalle
    // Puedes usar compact() o un array asociativo, dependiendo de tus necesidades

    return view('task.viewReport', compact('task'));
}


public function updateReport(Request $request, $id)
{
    $task = Task::findOrFail($id);

    $request->validate([
        'Report' => 'required|string',
    ]);

    $task->update([
        'Report' => $request->input('Report'),
    ]);

    return redirect()->route('tasks.show', ['task' => $task->id])
                     ->with('success', 'Reporte actualizado exitosamente.');
}





    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);

        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $statuses = Status::all();
        return view('task.edit', compact('task', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        request()->validate(Task::$rules);

        $task->update($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $task = Task::find($id)->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully');
    }
}
