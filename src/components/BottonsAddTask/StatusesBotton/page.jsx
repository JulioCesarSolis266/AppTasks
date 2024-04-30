import FetchStatuses from '@/app/_Fetch/statuses/page';
import { useState, useEffect } from 'react';

export default function StatusesBotton({ onStatusChange }) {
    const [statuses, setStatuses] = useState([]);
    const [isLoading, setIsLoading] = useState(true);
    const [statusId, setStatusId] = useState('');

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
            if (onStatusChange) {
                onStatusChange(selectedStatusId);
            }
        };

        if (isLoading) {
            return <h4 className='text-center m-10 text-indigo-200 font-bold text-4xl'>Cargando...</h4>;
        }

    return (
        <div>
            <h4 className="font-bold m-1">Estado de la tarea</h4>
            <select name="status" className='w-2/6 p-4' value={statusId} onChange={handleStatusChange}>
                <option value="">Seleccionar estado</option>
                {statuses.map((status) => (
                    <option key={status.id} value={status.id}>
                        {status.status}
                    </option>
                ))}
            </select>
        </div>
    );
}
