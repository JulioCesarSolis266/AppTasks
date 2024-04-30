// import { useState } from 'react';

// import CoordinatorsBotton from '../CoordinatorsBotton/page';
// import PrioritiesBotton from '../PrioritiesBotton/page';
// import StatusesBotton from '../StatusesBotton/page';
// import EmployeesBotton from '../EmployeesBotton/page';


// export default function AddTaskBotton({ incident, taskTitle, taskDetail, otherData, visitDate, coordinatorId, priorityId, statusId, employeeId }) {
//     const [csrfToken, setCsrfToken] = useState('');

//     const fetchCsrfToken = async () => {
//         try {
//             const res = await fetch('http://localhost:8000/csrf-cookie');
//             if (!res.ok) {
//                 throw new Error('Failed to fetch CSRF token');
//             }
//             const data = await res.json();
//             setCsrfToken(data.csrf_token);
//             console.log('CSRF token:', data.csrf_token);
//         } catch (error) {
//             console.error('Error fetching CSRF token:', error);
//         }
//     };

//     const handleAddTask = async () => {
//         if (!coordinatorId || !taskTitle || !taskDetail || !employeeId || !priorityId || !statusId || !visitDate || !incident) {
//             alert("Por favor, complete todos los campos obligatorios.");
            
//             return;
//         }

//         // Esperar a que se obtenga el token CSRF antes de enviar la tarea
//         await fetchCsrfToken();

//         const taskData = {
//             incident_id: incident,
//             title: taskTitle,
//             coordinator_id: coordinatorId,
//             visit_date: visitDate,
//             task_details: taskDetail,
//             priority_id: priorityId,
//             status_id: statusId,
//             other_data: otherData,
//             employee_id: employeeId,
//         };

//         try {
//             const res = await fetch('http://localhost:8000/api/V1/tasks', {
//                 method: 'POST',
//                 headers: {
//                     'Content-Type': 'application/json',
//                     'Authorization': process.env.API_KEY,
//                     'X-CSRF-TOKEN': csrfToken,
//                 },
//                 body: JSON.stringify(taskData),
//             });
//             if (!res.ok) {
//                 throw new Error('Failed to add task');
//             }
//             const data = await res.json();
//             alert('Tarea guardada correctamente');
            
//         } catch (error) {
//             console.error('Error al guardar la tarea:', error);
            
            
//         }
//     };

//     return (
//         <div>
//             <input 
//             type="button" 
//             value="Guardar Tarea" 
//             className="m-5 border p-2 rounded-xl text-white bg-indigo-500 hover:bg-indigo-700"
//             onClick={handleAddTask}
//             />
//         </div>
//     )
// }
