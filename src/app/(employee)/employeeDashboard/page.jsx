"use client";

import { useState, useEffect } from "react";
import axios from "axios";


export default function EmployeeDashboard({ userId, userName }) {

    const [tasks, setTasks] = useState([]);
    const [employeeId, setEmployeeId] = useState(undefined);

    useEffect(() => {
        const fetchData = async () => {
            try {
                const employeesResponse = await axios.get(`http://localhost:8000/api/V1/employees`);
                const loggedInEmployee = employeesResponse.data.find(employee => employee.user_id === userId);
                const employee = loggedInEmployee.id;
                setEmployeeId(employee); 
                
            } catch (error) {
                console.error('Error al obtener la lista de empleados: ', error);
            }
        };
        fetchData();
    }, [userId]);
    
    
    useEffect(() => {  
        if (employeeId !== undefined) {  
            const fetchTasks = async () => {
                try {
                    const response = await axios.get(`http://localhost:8000/api/V1/employees/${employeeId}/tasks`);
                    setTasks(response.data || []);
                } catch (error) {
                    console.error("Error al obtener la lista de tareas:", error);
                }
            };
            fetchTasks();
        }
        
    }, [employeeId]);
    

    // return (
    //     <div>
    //         <Header />
    //         {/* <h1>Hellow {userName}</h1> */}

    //          {tasks.map((data) => (
    //             <div key={data.id}>
    //                 <RenderTasks data={data} />
    //                 <hr />
    //             </div>
    //         ))}
             
    //     </div>
       

    // );

}