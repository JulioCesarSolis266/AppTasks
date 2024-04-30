'use client';

import { useEffect, useState } from "react";
import { useRouter } from "next/navigation";
import axios from "axios";
import DatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";



import FetchCoordinators from "@/app/_Fetch/coordinators/page";
import FetchPriorities from "@/app/_Fetch/priorities/page";
import FetchStatuses from "@/app/_Fetch/statuses/page";
import FetchEmployees from "@/app/_Fetch/employees/page";
// import CoordinatorsBotton from "@/components/BottonsAddTask/CoordinatorsBotton/page";
// import PrioritiesBotton from "@/components/BottonsAddTask/PrioritiesBotton/page";
// import StatusesBotton from "@/components/BottonsAddTask/StatusesBotton/page";
// import EmployeesBotton from "@/components/BottonsAddTask/EmployeesBotton/page";

export default function AddTask() {

    const [incident, setIncident] = useState("");
    const [taskDetail, setTaskDetail] = useState("");
    const [otherData, setOtherData] = useState("");
    const [visitDate, setVisitDate] = useState(new Date());
    const [taskTitle, setTaskTitle] = useState("");
    // const [coordinatorId, setCoordinatorId] = useState("");
    const [priorityId, setPriorityId] = useState("");
    const [statusId, setStatusId] = useState("");
    const [employeeId, setEmployeeId] = useState("");

    //----------------------------------------------
    const [coordinators, setCoordinators] = useState([]);
    const [isLoading, setIsLoading] = useState(true);
    const [coordinatorId, setCoordinatorId] = useState('');
    const [employees, setEmployees] = useState([]);
    const [priorities, setPriorities] = useState([]);
    const [statuses, setStatuses] = useState([]);

    //----------------------------------------------
    const [csrfToken, setCsrfToken] = useState('');

    const fetchCsrfToken = async () => {
        try {
            const res = await fetch('http://localhost:8000/csrf-cookie');
            if (!res.ok) {
                throw new Error('Failed to fetch CSRF token');
            }
            const data = await res.json();
            setCsrfToken(data.csrf_token);
            console.log('CSRF token:', data.csrf_token);
        } catch (error) {
            console.error('Error fetching CSRF token:', error);
        }
    };

    //----------------------------------------------
    useEffect(() => {
        const fetchCoordinators = async () => {
            try {
                const info = await FetchCoordinators();
                if (Array.isArray(info)) {
                    setCoordinators(info);
                } else {
                    throw new Error('Los datos recibidos de los coordinadores no son un array');
                }
                setIsLoading(false);
            } catch (error) {
                console.error('Error al obtener los datos de los coordinadores:', error);
            }
        };

        fetchCoordinators();
    }, []);

    const handleCoordinatorChange = (e) => {
        setCoordinatorId(e.target.value);

        if (isLoading) {
            return <h4 className='text-center m-10 text-indigo-200 font-bold text-4xl'>Cargando...</h4>;
        }
    };

    // console.log('coordinators:', coordinatorId);

    useEffect(() => {
        const fetchEmployees = async () => {
            try {
                const info = await FetchEmployees();
                if (Array.isArray(info)) {
                    setEmployees(info);
                } else {
                    throw new Error('Los datos recibidos de los empleados no son un array');
                }
                setIsLoading(false);
            } catch (error) {
                console.error('Error al obtener los datos de los empleados:', error);
            }
        };

        fetchEmployees();
    }, []);

    const handleEmployeeChange = (e) => {
        const selectedEmployeeId = e.target.value;
        setEmployeeId(selectedEmployeeId);
        if (isLoading) {
            return <h4 className='text-center m-10 text-indigo-200 font-bold text-4xl'>Cargando...</h4>;
        }
        
    };

    // console.log('employees:', employeeId);

    useEffect(() => {
        const fetchPriorities = async () => {
            try {
                const info = await FetchPriorities();
                if (Array.isArray(info.data)) {
                    setPriorities(info.data);
                } else {
                    throw new Error('Los datos recibidos de las prioridades no son un array');
                }
                setIsLoading(false);
            } catch (error) {
                console.error('Error al obtener los datos de las prioridades:', error);
            }
        };

        fetchPriorities();
    }, []);

    const handlePriorityChange = (e) => {
        const selectedPriorityId = e.target.value;
        setPriorityId(selectedPriorityId);
        if (isLoading) {
            return <h4 className='text-center m-10 text-indigo-200 font-bold text-4xl'>Cargando...</h4>;
        }
    };

    // console.log('priorities:', priorityId);

    useEffect(() => {
        const fetchStatuses = async () => {
            try {
                const info = await FetchStatuses();
                if (Array.isArray(info.data)) {
                    setStatuses(info.data);
                } else {
                    throw new Error('Los datos recibidos de los estados no son un array');
                }
                setIsLoading(false);
            } catch (error) {
                console.error('Error al obtener los datos de los estados:', error);
            }
        };

        fetchStatuses();
    }, []);

    const handleStatusChange = (e) => {
        const selectedStatusId = e.target.value;
        setStatusId(selectedStatusId);

        if (isLoading) {
            return <h4 className='text-center m-10 text-indigo-200 font-bold text-4xl'>Cargando...</h4>;
        }
        
    };

    // console.log('statuses:', statusId);

    //----------------------------------------------

    const handleAddTask = async () => {
        if (!coordinatorId || !taskTitle || !taskDetail || !employeeId || !priorityId || !statusId || !visitDate || !incident) {
            alert("Por favor, complete todos los campos obligatorios.");
           
        }
        // Esperar a que se obtenga el token CSRF antes de enviar la tarea
        await fetchCsrfToken();

        const taskData = {
            incident_id: incident,
            title: taskTitle,
            coordinator_id: coordinatorId,
            visit_date: visitDate,
            task_details: taskDetail,
            priority_id: priorityId,
            status_id: statusId,
            other_data: otherData,
            employee_id: employeeId,
        };

        const axiosConfig = {
            headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": csrfToken,
            },
          };

          try {
            const res = await axios.post(//
              "http://localhost:8000/api/V1/tasks",
              taskData,// Aquí se envía la información de la tarea
              axiosConfig, // Aquí se envía el token CSRF
            );
                        
            if (!res.ok) {
                throw new Error('Failed to add task');
            }
            const data = await res.json();
            alert('Tarea guardada correctamente');
            
        } catch (error) {
            console.error('Error al guardar la tarea:', error);
            console.log('Tarea :' + taskData.incident_id + ' ' + taskData.title + ' ' + taskData.coordinator_id + ' ' + taskData.visit_date + ' ' + taskData.task_details + ' ' + taskData.priority_id + ' ' + taskData.status_id + ' ' + taskData.other_data + ' ' + taskData.employee_id + ' ' + csrfToken)
            
        }
    };
    //----------------------------------------------

    const router = useRouter();

    const handleToDashboard = () => {
        router.push('/bossDashboard');
    }


    return (
        <div className="text-center">

            <h2 className="text-4xl font-bold p-5 bg-black text-white">Agregar Tarea</h2>
            <input className="m-5 border p-2 rounded-xl bg-indigo-500" type="button" value="Volver" onClick={handleToDashboard}/>

            <h4 className="font-bold m-1">Coordinador</h4>
            <select name="coordinator" className='w-2/6 p-4' value={coordinatorId} onChange={handleCoordinatorChange}>
                <option value="">Seleccionar coordinador</option>
                {coordinators.map((coordinator) => (
                    <option key={coordinator.id} value={coordinator.id}>
                        {coordinator.name}
                    </option>
                    
                ))}
            </select>
            <br /><br />

            <h4 className="font-bold m-1">Prioridad</h4>
            <select name="priority" className='w-2/6 p-4' value={priorityId} onChange={handlePriorityChange}>
                <option value="">Seleccionar prioridad</option>
                {priorities.map((priority) => (
                    <option key={priority.id} value={priority.id}>
                        {priority.task_priority}
                    </option>
                ))}
            </select>
            <br /><br />

            <h4 className="font-bold m-1">Estado de la tarea</h4>
            <select name="status" className='w-2/6 p-4' value={statusId} onChange={handleStatusChange}>
                <option value="">Seleccionar estado</option>
                {statuses.map((status) => (
                    <option key={status.id} value={status.id}>
                        {status.status}
                    </option>
                ))}
            </select>
            <br /><br />
            <h4 className="font-bold m-1">Empleado a cargo</h4>
            <select name="employee" className='w-2/6 p-4' value={employeeId} onChange={handleEmployeeChange}>
                <option value="">Seleccionar empleado</option>
                {employees.map((employee) => (
                    <option key={employee.id} value={employee.id}>
                        {employee.user.name} {employee.user.surname}
                    </option>
                ))}
            </select>
            <br /><br />
            
            <input
                type="text"
                name="incidente"
                placeholder="Numero de Incidente"
                className="m-5 border p-2 rounded-xl w-2/6"
                value={incident}
                onChange={(e) => setIncident(e.target.value)}
            />
                
            <br />
            <input
                type="text"
                name="titulo-tarea"
                placeholder="Titulo de la Tarea"
                className="m-5 border p-2 rounded-xl w-2/6"
                value={taskTitle}
                onChange={(e) => setTaskTitle(e.target.value)}
                />
            <br />

            <textarea 
                name="detalle-tarea"
                placeholder="Detalle de la Tarea"
                className="m-5 border p-2 rounded-xl w-2/6"
                value={taskDetail}
                onChange={(e) => setTaskDetail(e.target.value)}
            />
            <br />
            <textarea
                name="otros-datos"
                placeholder="Otros Datos"
                className="m-5 border p-2 rounded-xl w-2/6"
                value={otherData}
                onChange={(e) => setOtherData(e.target.value)}
            />
            <br />

            <p className="font-bold">Fecha de Visita</p>
            <DatePicker
                selected={visitDate}
                onChange={(date) => setVisitDate(date)}
                className="m-4 border p-2 rounded-xl w-3/6 text-center"
            />
            <br />

            <input
            type="button"
            value="Guardar Tarea" 
            className="m-5 border p-2 rounded-xl text-white bg-indigo-500 hover:bg-indigo-700"
            onClick={handleAddTask}
            />
        </div>
    );
}


// export function CoordinatorsBotton({onCoordinatorChange}) {
    // const [coordinators, setCoordinators] = useState([]);
    // const [isLoading, setIsLoading] = useState(true);
    // const [coordinatorId, setCoordinatorId] = useState('');

    // useEffect(() => {
    //     const fetchCoordinators = async () => {
    //         try {
    //             const info = await FetchCoordinators();
    //             if (Array.isArray(info)) {
    //                 setCoordinators(info);
    //             } else {
    //                 throw new Error('Los datos recibidos de los coordinadores no son un array');
    //             }
    //             setIsLoading(false);
    //         } catch (error) {
    //             console.error('Error al obtener los datos de los coordinadores:', error);
    //         }
    //     };

    //     fetchCoordinators();
    // }, []);

    // const handleCoordinatorChange = (e) => {
    //     setCoordinatorId(e.target.value);
    //     if (onCoordinatorChange) {
    //         onCoordinatorChange(e.target.value);
    //     }
    // };

    // if (isLoading) {
    //     return <h4 className='text-center m-10 text-indigo-200 font-bold text-4xl'>Cargando...</h4>;
    // }

    // console.log('coordinators:', coordinatorId);
    
//     return (
//         <div>
//             <h4 className="font-bold m-1">Coordinador</h4>
//             <select name="coordinator" className='w-2/6 p-4' value={coordinatorId} onChange={handleCoordinatorChange}>
//                 <option value="">Seleccionar coordinador</option>
//                 {coordinators.map((coordinator) => (
//                     <option key={coordinator.id} value={coordinator.id}>
//                         {coordinator.name}
//                     </option>
                    
//                 ))}
//             </select>
            
//         </div>
//     );
// }
