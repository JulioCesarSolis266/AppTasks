import FetchEmployees from '@/app/_Fetch/employees/page';
import { useState, useEffect } from 'react';

export default function EmployeesBotton({ onEmployeeChange }) {
    const [employees, setEmployees] = useState([]);
    const [isLoading, setIsLoading] = useState(true);
    const [employeeId, setEmployeeId] = useState('');

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
        if (onEmployeeChange) {
            onEmployeeChange(selectedEmployeeId);//Esto es lo que se va a enviar al componente padre
        }
        
    };

    if (isLoading) {
        return <h4 className='text-center m-10 text-indigo-200 font-bold text-4xl'>Cargando...</h4>;
    }

    return (
        <div>
            <h4 className="font-bold m-1">Empleado a cargo</h4>
            <select name="employee" className='w-2/6 p-4' value={employeeId} onChange={handleEmployeeChange}>
                <option value="">Seleccionar empleado</option>
                {employees.map((employee) => (
                    <option key={employee.id} value={employee.id}>
                        {employee.user.name} {employee.user.surname}
                    </option>
                ))}
            </select>
        </div>
    );
}
