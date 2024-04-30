import { useRouter } from "next/navigation";



export const Header = () => {

    const router = useRouter();

    const handleAddTask = () => {
        router.push('../addTask');
    }

    const handleTaskDetail = () => {
        router.push('../taskDetails');
    }

    const handleSeeSavedTasks = () => {
        router.push('/seeSavedTasks');
    }

    return (
        <div className="w-full text-center  bg-black text-white p-2">
            <h2 className="text-5xl font-serif m-2">Tareas Pendientes</h2>
            
                <input type="button" value="Agregar Tarea" onClick={handleAddTask} className="mt-5 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mx-5"/>
                <input type="button" value="Ver Cierres" onClick={handleTaskDetail} className="mt-5 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mx-5" />
                <input type="button" value="Ver Tareas Archivadas" onClick={handleSeeSavedTasks} className="mt-5 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mx-5"/>
            
            <br /><br />
        </div>
    );
}